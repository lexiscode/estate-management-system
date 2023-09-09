@extends('users.layout.master')

@section('agents')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Agents</span>
            <h2>Agents</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer agents">

            <div class="row">
                <div class="col-lg-8  col-lg-offset-2 col-sm-12">

                    @foreach ($agents as $agent)

                    <!-- agents -->
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="{{ asset('uploads/agents/' . $agent->image) }}""
                                    class="img-responsive" alt="agent name"></a></div>
                        <div class="col-lg-7 col-sm-7 ">
                            <h4>{{ $agent->name }}</h4>
                            <p>{{ $agent->about }}</p>
                        </div>
                        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a
                                href="mailto:{{ $agent->email }}">{{ $agent->email }}</a><br>
                            <span class="glyphicon glyphicon-earphone"></span> {{ $agent->phone_no }}
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>

        </div>
    </div>

@endsection
