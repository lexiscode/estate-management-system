@extends('admin.layouts.master')

@section('show-property-details')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Property Details!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.property.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $property->title }}</h2>

                <!-- Display the image -->
                <img src="{{ asset('uploads/properties/' . $property->image) }}" alt="Property Image">

                <p style="color: black;"><b>Property Type:</b> {{ $property->property_type }}</p>
                <p style="color: black;"><b>Price:</b> {{ number_format($property->price, 2) }}</p>
                <p style="color: black;"><b>Location:</b> {{ $property->location }}</p>
                <p style="color: black;"><b>Property Details:</b> {{ $property->property_details }}</p>
                <p style="color: black;"><b>Agent Name:</b> {{ $property->agent_name }}</p>
                <p style="color: black;"><b>Agent Number:</b> {{ $property->agent_no }}</p>
                <p style="color: black;"><b>Status:</b> {{ $property->status }}</p>

                <!-- Retrieves only True values and by default excludes id, created_at and updated_at columns-->
                <p style="color: black;"><b>Availability:</b>
                    @foreach($property->availability->toArray() as $key => $value)
                        @if(!is_null($value) && $value !== false && !in_array($key, ['id', 'created_at', 'updated_at']))
                            {{ ucfirst($key) }}: {{ $value }} |
                        @endif
                    @endforeach
                </p>

                <p style="color: black;"><b>Date Created:</b> {{ $property->created_at }}</p>
                <p style="color: black;"><b>Last Updated:</b> {{ $property->updated_at }}</p>
            </div>
        </div>

    </section>
@endsection
