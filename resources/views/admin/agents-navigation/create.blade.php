@extends('admin.layouts.master')

@section('create-agents')
    <section class="section">

        <div class="section-header">
            <h1>Manage Agents</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Add New Agent Here!</h4>
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

                <!-- This is a form to create new property-->
                <form method="POST" action="{{ route('admin.agent.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputName">Name:</label>
                                <input type="text" name="name" class="form-control" id="inputName" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail">Email:</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNumber">Phone Number:</label>
                                <input type="tel" name="phone_no" class="form-control" id="inputNumber" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="uploadImage">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="uploadImage" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="about">About Agent:</label>
                            <textarea class="form-control" name="about" id="about"></textarea>
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
