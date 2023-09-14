@extends('admin.layouts.master')

@section('update-agents')
    <section class="section">

        <div class="section-header">
            <h1>Manage Agents</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Update An Agent Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.agent.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a form to update a property-->
                <form method="POST" action="{{ route('admin.agent.update', ['agent' => $agent->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputName">Name:</label>
                                <input type="text" name="name" class="form-control" id="inputName" value="{{ $agent->name }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEmail">Email:</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{ $agent->email }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputNumber">Phone Number:</label>
                                <input type="text" name="phone_no" class="form-control" id="inputNumber" value="{{ $agent->phone_no }}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="uploadImage">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="uploadImage">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="about">About Agent:</label>
                            <textarea class="form-control" name="about" id="about">{{ $agent->about }}</textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
