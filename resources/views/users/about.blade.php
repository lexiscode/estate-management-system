@extends('users.layout.master')

@section('about')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / About Us</span>
            <h2>About Us</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row">
                <div class="col-lg-8  col-lg-offset-2">

                    @foreach ($abouts as $about)

                        <img src="{{ asset('uploads/about/' . $about->image) }}" class="img-responsive thumbnail" alt="realestate">
                        <h3>Business Background</h3>
                        <p>{{ $about->background }}</p>
                        <h3>Company Profile</h3>
                        <p>{{ $about->profile }}</p>

                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
