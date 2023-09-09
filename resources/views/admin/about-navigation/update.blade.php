@extends('admin.layouts.master')

@section('about')
    <section class="section">

        <div class="section-header">
            <h1>All Enquiries Received</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Checkout Your Potential Client Enquiries Here!</h4>
            </div>
            <div class="card-body">

                <!-- Display updated blog success message if it exists -->
                @if (session('update-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('update-success') }}
                        </div>
                    </div>
                @endif


                <!-- This is a form to create new blog post -->
                <form method="POST" action="{{ route('admin.about.update', ['about' => $about->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="background">Business Background</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="background" id="background" spellcheck="false" data-ms-editor="true">{{ $about->background }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="profile">Company Profile</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" name="profile" id="profile" spellcheck="false" data-ms-editor="true">{{ $about->profile }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-group col-md-5">
                                    <input type="file" class="form-control" name="image" id="uploadImage" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>

    </section>
@endsection
