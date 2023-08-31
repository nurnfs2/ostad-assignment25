@extends('layouts.app')

@section('content')

<style>
.col-md-2 .card:hover{
    background: rgb(255, 202, 122);
    cursor: pointer;
}
.col-md-2 .card:active{
    background: rgb(255, 123, 0);
}
.card-img-top{
    height: 200px;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-danger">{{ Auth::user()->user_type }} {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome Mr. {{ Auth::user()->name }}</h1>
                    <h4 class="text-primary">{{ Auth::user()->user_type }}</h4>
                    <hr>
                    {{ __('You are logged in!') }}
                    <hr>

                    <div class="row g-3">
                        @if (Auth::user()->user_type=='Admin')
                        <div class="col-md-2">
                            <a href="#">
                                <div class="card text-start">
                                    <img class="card-img-top" src="{{ asset('images/user.png') }}" alt="Users Information">
                                    <div class="card-body">
                                      <h4 class="card-title text-center">Users</h4>
                                    </div>
                               </div>
                            </a>
                        </div>
                        @endif
                        @if (Auth::user()->user_type=='Admin')

                        @endif


                        @if (Auth::user()->user_type=='Employee')
                        <div class="col-md-2">
                            <a href="#">
                                <div class="card text-start">
                                    <img class="card-img-top" src="{{ asset('images/leave.png') }}" alt="Leave Requests">
                                    <div class="card-body">
                                    <h4 class="card-title text-center">Leave Requests</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif

                        @if (Auth::user()->user_type=='Manager')
                        <div class="col-md-2">
                            <a href="#">
                                <div class="card text-start">
                                    <img class="card-img-top" src="{{ asset('images/approve.png') }}" alt="Approval Process">
                                    <div class="card-body">
                                    <h4 class="card-title text-center">Approval Process</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif

                        <div class="col-md-2">
                            <a href="#">
                                <div class="card text-start">
                                    <img class="card-img-top" src="{{ asset('images/leave-balance.jpg') }}" alt="Leave Balances">
                                    <div class="card-body">
                                    <h4 class="card-title text-center">Leave Balances</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-2">
                            <a href="#">
                                <div class="card text-start">
                                    <img class="card-img-top" src="{{ asset('images/report.png') }}" alt="Reports">
                                    <div class="card-body">
                                        <h4 class="card-title text-center">Reports</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>



                    <br>
                    <br>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
