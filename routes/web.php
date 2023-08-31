<?php

use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->name('leave-requests.index');
    Route::get('/leave-requests/create', [LeaveRequestController::class, 'create'])->name('leave-requests.create');
    Route::post('/leave-requests', [LeaveRequestController::class, 'store'])->name('leave-requests.store');
    Route::get('/leave-balance', [LeaveRequestController::class, 'balance'])->name('leave-requests.balance');

    Route::get('/leave-requests-manager', [LeaveRequestController::class, 'indexManager'])->name('leave-requests.manager');
    Route::get('/leave-requests/{leaveid}/approve', [LeaveRequestController::class, 'approve'])->name('leave-requests.approve');
    Route::get('/leave-requests/{leaveid}/reject', [LeaveRequestController::class, 'reject'])->name('leave-requests.reject');

    Route::get('/my-leave-report', [LeaveRequestController::class, 'myReport'])->name('leave-requests.myreport');
    Route::get('/leave-report', [LeaveRequestController::class, 'leaveReport'])->name('leave-requests.leavereport');
});
