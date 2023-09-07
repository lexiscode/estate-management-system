@extends('users.layout.master')

@section('forgot-password')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Forgot Password</span>
            <h2>Forgot Password</h2>
        </div>
    </div>

    <!-- banner -->
    <div class="container">
        <div class="spacer">
            <div class="row register">
                <form method="POST" action="{{ route('user.forgot-password.send') }}">
                    @csrf
                    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

                        <div>
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <br>

                        @if (session()->has('success'))
                            <i style="margin: 0 auto; text-align: center; color: green"><b>{{ session()->get('success') }}</b></i>
                            <br>
                        @endif

                        <!-- Email Address -->
                        <label for="email">YOUR EMAIL:</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <button type="submit" class="btn btn-success">Send Reset Link</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
