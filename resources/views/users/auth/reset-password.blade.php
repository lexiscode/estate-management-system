@extends('users.layout.master')

@section('reset-password')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Reset Password</span>
            <h2>Reset Password</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row register">
                <form method="POST" action="{{ route('user.reset-password.send') }}">
                    @csrf

                    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email Address -->
                        <label for="email">YOUR EMAIL:</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" value="{{ $email }}" required>

                        <!-- Your Password -->
                        <label for="password">YOUR PASSWORD:</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>

                        <!-- Confirm Password -->
                        <label for="password_confirmation">CONFIRM PASSWORD:</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required>

                        <button type="submit" class="btn btn-success">Reset Password</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    
@endsection
