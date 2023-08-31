@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Leave Balance</h1>

        <div class="card text-start col-md-4">
          {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
          <div class="card-body">
            <table class="table">
                <tr>
                    <td>
                        <h4 class="card-title">Total Leave</h4>
                    </td>
                    <td>
                        <h4 class="card-title">Leave Used</h4>
                    </td>
                    <td>
                        <h4 class="card-title">Leave Balance</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="text-primary">{{ $mainBalance }}</h1>
                    </td>
                    <td>
                        <h1 class="text-success">{{ $used }}</h1>
                    </td>
                    <td>
                        <h1 class="text-danger">{{ $balance }}</h1>
                    </td>
                </tr>
            </table>


          </div>
        </div>

        <a href="/home" class="btn btn-info">Back</a>



    </div>
@endsection
