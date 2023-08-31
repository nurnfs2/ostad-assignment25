@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create Leave Request</h1>

        <form method="POST" action="{{ route('leave-requests.store') }}">
            @csrf

            <div class="form-group">
                <label for="category_id">Leave Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach ($leaveCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                </div>

            </div>



            <div class="form-group">
                <label for="reason">Reason</label>
                <textarea name="reason" id="reason" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
@endsection
