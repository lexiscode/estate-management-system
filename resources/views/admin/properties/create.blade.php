@extends('admin.layouts.master')

@section('create-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Create New Property Here!</h4>
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

                <!-- This is a form to create new property-->
                <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTitle">Title</label>
                                <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Name of Apartment">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="property-type">Property Type</label>
                                <select class="form-control form-control-sm" name="property_type">
                                    <option value="One-Bedroom Apartment">One-Bedroom Apartment</option>
                                    <option value="Two-Bedroom Apartment">Two-Bedroom Apartment</option>
                                    <option value="Three-Bedroom Apartment">Three-Bedroom Apartment</option>
                                    <option value="Mansion Apartment">Mansion Apartment</option>
                                    <option value="Duplex Apartment">Duplex Apartment</option>
                                    <option value="Student Housing">Student Housing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name="location" class="form-control" id="inputAddress" placeholder="Enter the address">
                        </div>

                        <div class="form-group">
                            <label for="property-details">Property Details</label>
                            <textarea class="form-control" name="property_details" id="property-details"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPrice">Price:</label>
                                <input type="text" name="price" class="form-control" id="inputPrice">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="uploadImage">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="uploadImage" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputStatus">Status</label>
                                <select class="form-control form-control-sm" name="status">
                                    <option>New</option>
                                    <option>Sold</option>
                                    <option>Rent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAgentName">Name of Agent:</label>
                                <input type="text" name="agent_name" class="form-control" id="inputAgentName" placeholder="Input the name of agent..">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputAgentNumber">Phone Number of Agent:</label>
                                <input type="text" name="agent_no" class="form-control" id="inputAgentNumber" placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <label>Input only the number(s) of availability where necessary and leave unavailable fields blank:</label>
                    <br><br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputBedroom">Bed Room:</label>
                            <input type="number" name="bedroom" class="form-control" id="inputBedroom">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputLivingroom">Living Room:</label>
                            <input type="number" name="livingroom" class="form-control" id="inputLivingroom">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPark">Parking Garage:</label>
                            <input type="number" name="parking" class="form-control" id="inputPark">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputKitchen">Kitchen:</label>
                            <input type="number" name="kitchen" class="form-control" id="inputKitchen">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputWaitingroom">Waiting Room:</label>
                            <input type="number" name="waitingroom" class="form-control" id="inputWaitingroom">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputStudyroom">Study Room:</label>
                            <input type="number" name="studyroom" class="form-control" id="inputStudyroom">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputStore">Store Room:</label>
                            <input type="number" name="storeroom" class="form-control" id="inputStore">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputLaundry">Laundry Room:</label>
                            <input type="number" name="laundryroom" class="form-control" id="inputLaundry">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputBathroom">Bathroom:</label>
                            <input type="number" name="bathroom" class="form-control" id="inputBathroom">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputDining">Dining Room:</label>
                            <input type="number" name="diningroom" class="form-control" id="inputDining">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputBalcony">Balcony:</label>
                            <input type="number" name="balcony" class="form-control" id="inputBalcony">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputGuest">Guest Room:</label>
                            <input type="number" name="guestroom" class="form-control" id="inputGuest">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputClosets">Closets:</label>
                            <input type="number" name="closets" class="form-control" id="inputClosets">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPantry">Pantry:</label>
                            <input type="number" name="pantry" class="form-control" id="inputPantry">
                        </div>
                    </div>
                    <hr>
                    <br><br>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="in_featured" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Featured</span>
                            </label>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="in_recommended" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Recommended</span>
                            </label>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="in_hot" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Hot</span>
                            </label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
