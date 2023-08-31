<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\LeaveCategory;
use App\Notifications\LeaveRequestApproved;
use App\Notifications\LeaveRequestRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveRequestController extends Controller
{
    //

    public function index()
    {
        $user = auth()->user();
        $leaveApplications = LeaveApplication::where('user_id', $user->id)->join('leave_categories', 'leave_applications.category_id', '=', 'leave_categories.id')->get();

        return view('leave-requests.index', compact('leaveApplications'));
    }

    public function create()
    {
        $leaveCategories = LeaveCategory::all();

        return view('leave-requests.create', compact('leaveCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $user = auth()->user();

        $LeaveApplication = LeaveApplication::create([
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted.');
    }


    public function balance()
    {
        $mainBalance = 20;
        $user = auth()->user();
        $used = LeaveApplication::where('user_id', $user->id)->count();
        $balance = $mainBalance - $used;

        return view('leave-requests.balance', compact('mainBalance', 'used', 'balance'));
    }








    public function indexManager()
    {
        $leaveApplications = LeaveApplication::join('users', 'leave_applications.user_id', '=', 'users.id')
                                            ->join('leave_categories', 'leave_applications.category_id', '=', 'leave_categories.id')
                                            ->select('leave_applications.*', 'users.name as employee', 'leave_categories.name')
                                            ->get();

        return view('leave-requests.manager', compact('leaveApplications'));
    }



    public function approve($leaveid)
    {
        $leaveData = LeaveApplication::find($leaveid);
        $leaveData->update(['status' => 'approve']);

        // Notify the user that their request was approved
        // $leaveData->user->notify(new LeaveRequestApproved($leaveData));

        // Send the email immediately
        Mail::send(new LeaveRequestApproved(['leaveData' => $leaveData]));


        return redirect()->route('leave-requests.manager')->with('success', 'Leave request approved.');
    }

    public function reject($leaveid)
    {
        $leaveData = LeaveApplication::find($leaveid);
        $leaveData->update(['status' => 'reject']);

        // Notify the user that their request was rejected
        // $leaveRequest->user->notify(new LeaveRequestRejected($leaveRequest));

        // Send the email immediately
        Mail::send(new LeaveRequestRejected(['leaveData' => $leaveData]));

        return redirect()->route('leave-requests.manager')->with('success', 'Leave request rejected.');
    }





    // Reports

    public function myReport()
    {
        $user = auth()->user();
        $leaveApplications = LeaveApplication::where('user_id', $user->id)->join('leave_categories', 'leave_applications.category_id', '=', 'leave_categories.id')->get();

        return view('leave-requests.myreport', compact('leaveApplications'));
    }


    public function leaveReport()
    {
        $leaveApplications = LeaveApplication::join('users', 'leave_applications.user_id', '=', 'users.id')
                                            ->join('leave_categories', 'leave_applications.category_id', '=', 'leave_categories.id')
                                            ->select('leave_applications.*', 'users.name as employee', 'leave_categories.name')
                                            ->get();

        return view('leave-requests.leavereport', compact('leaveApplications'));
    }




}
