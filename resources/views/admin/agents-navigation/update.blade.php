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

                <!-- This is a form to update an agent-->
                <form method="POST" action="{{ route('admin.agent.update', ['agent' => $agent->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputName">Name:</label>
                                <input type="text" name="name" class="form-control" id="inputName" value="{{ $agent->name }}" required>
                                <div class="invalid-feedback">
                                    Please fill in agent name
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail">Email:</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{ $agent->email }}" required>
                                <div class="invalid-feedback">
                                    Please fill in an email address
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNumber">Phone Number:</label>
                                <input type="text" name="phone_no" class="form-control" id="inputNumber" value="{{ $agent->phone_no }}" required>
                                <div class="invalid-feedback">
                                    Please fill in contact number
                                </div>
                                @error('phone_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="image-upload">Upload Image:</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="about">About Agent:</label>
                            <textarea class="form-control" name="about" id="about">{{ $agent->about }}</textarea>
                            <div class="invalid-feedback">
                                Please fill in information about agent
                            </div>
                            @error('about')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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

@push('scripts')

    <script>
        $(document).ready(function(){
            var imageUrl = "{{ asset('uploads/agents/' . $agent->image) }}";
            $('.image-preview').css({
                "background-image": "url(" + imageUrl + ")",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>

@endpush
