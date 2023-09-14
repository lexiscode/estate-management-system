@extends('admin.layouts.master')

@section('update-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Update Property Here!</h4>
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

                <!-- This is a form to update a property-->
                <form method="POST" action="{{ route('admin.property.update', ['property' => $property->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTitle">Title</label>
                                <input type="text" name="title" class="form-control" id="inputTitle" value="{{ $property->title }}" placeholder="Name of Apartment">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="property-type">Property Type</label>
                                <select class="form-control form-control-sm" name="property_type">
                                    @foreach ([
                                        'One-Bedroom Apartment' => 'One-Bedroom Apartment',
                                        'Two-Bedroom Apartment' => 'Two-Bedroom Apartment',
                                        'Three-Bedroom Apartment' => 'Three-Bedroom Apartment',
                                        'Mansion Apartment' => 'Mansion Apartment',
                                        'Duplex Apartment' => 'Duplex Apartment',
                                        'Student Housing' => 'Student Housing',
                                    ] as $optionValue => $optionLabel)
                                        <option value="{{ $optionValue }}" {{ $property->property_type === $optionValue ? 'selected' : '' }}>
                                            {{ $optionLabel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name="location" class="form-control" id="inputAddress" value="{{ $property->location }}" placeholder="Enter the address">
                        </div>

                        <div class="form-group">
                            <label for="property-details">Property Details</label>
                            <textarea class="form-control" name="property_details" id="property-details">{{ $property->property_details }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPrice">Price:</label>
                                <input type="text" name="price" class="form-control" id="inputPrice" value="{{ $property->price }}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="uploadImage">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="uploadImage">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputStatus">Status</label>
                                <select class="form-control form-control-sm" name="status">
                                    @foreach (['New', 'Sold', 'Rent'] as $optionValue)
                                        <option value="{{ $optionValue }}" {{ $property->status === $optionValue ? 'selected' : '' }}>
                                            {{ $optionValue }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAgentName">Name of Agent:</label>
                                <input type="text" name="agent_name" class="form-control" id="inputAgentName" value="{{ $property->agent_name }}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputAgentNumber">Phone Number of Agent:</label>
                                <input type="text" name="agent_no" class="form-control" id="inputAgentNumber" value="{{ $property->agent_no }}" placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <label>Input only the number(s) of availability where necessary and leave unavailable fields blank:</label>
                    <br><br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputBedroom">Bed Room:</label>
                            <input type="text" name="bedroom" class="form-control" id="inputBedroom" value="{{ $property->availability->bedroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputLivingroom">Living Room:</label>
                            <input type="text" name="livingroom" class="form-control" id="inputLivingroom" value="{{ $property->availability->livingroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPark">Parking Garage:</label>
                            <input type="text" name="parking" class="form-control" id="inputPark" value="{{ $property->availability->parking }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputKitchen">Kitchen:</label>
                            <input type="text" name="kitchen" class="form-control" id="inputKitchen" value="{{ $property->availability->kitchen }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputWaitingroom">Waiting Room:</label>
                            <input type="text" name="waitingroom" class="form-control" id="inputWaitingroom" value="{{ $property->availability->waitingroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputStudyroom">Study Room:</label>
                            <input type="text" name="studyroom" class="form-control" id="inputStudyroom" value="{{ $property->availability->studyroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputStore">Store Room:</label>
                            <input type="text" name="storeroom" class="form-control" id="inputStore" value="{{ $property->availability->storeroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputLaundry">Laundry Room:</label>
                            <input type="text" name="laundryroom" class="form-control" id="inputLaundry" value="{{ $property->availability->laundryroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputBathroom">Bathroom:</label>
                            <input type="text" name="bathroom" class="form-control" id="inputBathroom" value="{{ $property->availability->bathroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputDining">Dining Room:</label>
                            <input type="text" name="diningroom" class="form-control" id="inputDining" value="{{ $property->availability->diningroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputBalcony">Balcony:</label>
                            <input type="text" name="balcony" class="form-control" id="inputBalcony" value="{{ $property->availability->balcony }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputGuest">Guest Room:</label>
                            <input type="text" name="guestroom" class="form-control" id="inputGuest" value="{{ $property->availability->guestroom }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputClosets">Closets:</label>
                            <input type="text" name="closets" class="form-control" id="inputClosets" value="{{ $property->availability->closets }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPantry">Pantry:</label>
                            <input type="text" name="pantry" class="form-control" id="inputPantry" value="{{ $property->availability->pantry }}">
                        </div>
                    </div>
                    <hr>
                    <br><br>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="in_featured" class="custom-switch-input" {{ $property->in_featured ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Featured</span>
                            </label>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="in_recommended" class="custom-switch-input" {{ $property->in_recommended ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Recommended</span>
                            </label>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="in_hot" class="custom-switch-input" {{ $property->in_hot ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Hot</span>
                            </label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
