@extends('layout.customer')
@section('content')
    <div class="container">
        <div class="card-body">
            <h2 class="mb-4">My Account</h2>
            <h3 class="card-title">Profile Details</h3>


            <div class="form-label">Email:  {{$user->email}}</div>


            <form action="" method="POST">
                @csrf
                <div class="col-md pt-1">
                    <div class="form-label">Name</div>
                    <input name="name" type="text" class="form-control" value="{{$user->name}}">
                </div>
                <div class="row">
                    <div class="pt-2 col-lg-11 col-md-10 col-12">
                        <a href="#" class="btn btn-warning btn-block">
                            Change Password
                        </a>
                    </div>
                    <div class="pt-2 col-lg-1 col-md-2 col-12">
                        <button type="submit" class="btn btn-success btn-block">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

            <form id="logout-form" action="{{ route('Account.sign-out') }}" method="POST">
                @csrf
                <div class="pt-2">
                    <button class="btn btn-danger " type="submit">Sign Out</button>

                </div>
            </form>




        </div>

    </div>
@endsection
