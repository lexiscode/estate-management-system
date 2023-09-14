@extends('users.layout.master')

@section('register')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Register</span>
            <h2>Register</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <h2 style="text-align: center;">Create a New Account</h2>
            <div class="row register">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

                        <label for="name">YOUR NAME:</label>
                        <input type="text" class="form-control" placeholder="Full Name" name="name" id="name" required>

                        <label for="email">YOUR EMAIL:</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>

                        <label for="password">YOUR PASSWORD:</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>

                        <label for="password_confirmation">CONFIRM PASSWORD:</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required>

                        {{-- <textarea rows="6" class="form-control" placeholder="Address" name="form_message"></textarea> --}}
                        <button type="submit" class="btn btn-success" name="Submit">Register</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
