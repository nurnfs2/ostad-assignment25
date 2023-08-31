@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Leave Report</h1>

        <a href="/home" class="btn btn-info">Back</a>

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Leave Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($leaveApplications as $leaveApplication)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $leaveApplication->employee }}</td>
                        <td>{{ $leaveApplication->name }}</td>
                        <td>{{ $leaveApplication->start_date }} to {{ $leaveApplication->end_date }}</td>
                        <td>{{ $leaveApplication->reason }}</td>
                        <td>{{ $leaveApplication->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
{{-- {{ $leaveApplications }} --}}

    </div>
@endsection
