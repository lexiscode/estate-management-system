@extends('admin.layouts.master')

@section('show-agent-details')
    <section class="section">

        <div class="section-header">
            <h1>Manage Agents</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Agent Information!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save agent button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.agent.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $agent->name }}</h2>

                <!-- Display the image -->
                <img src="{{ asset('uploads/agents/' . $agent->image) }}" alt="agent Image">

                <p style="color: black;"><b>Email Address:</b> {{ $agent->email }}</p>
                <p style="color: black;"><b>Phone Number:</b> {{ $agent->phone_no }}</p>
                <p style="color: black;"><b>About Agent:</b> {{ $agent->about }}</p>

               <hr>

                <p style="color: black;"><b>Date Created:</b> {{ $agent->created_at }}</p>
                <p style="color: black;"><b>Last Updated:</b> {{ $agent->updated_at }}</p>
            </div>
        </div>

    </section>
@endsection
