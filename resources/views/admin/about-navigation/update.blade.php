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


                <form method="POST" action="{{ route('admin.about.update', ['about' => $about->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="background">Business Background</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="background" class="summernote-simple" id="background">{{ $about->background }}</textarea>
                                <div class="invalid-feedback">
                                    Please fill in a business background
                                </div>
                                @error('background')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="profile">Company Profile</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="profile" class="summernote-simple" id="profile">{{ $about->profile }}</textarea>
                                <div class="invalid-feedback">
                                    Please fill in company's profile information
                                </div>
                                @error('profile')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-group col-md-5">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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

@push('scripts')

    <script>
        $(document).ready(function(){
            var imageUrl = "{{ asset('uploads/about/' . $about->image) }}";
            $('.image-preview').css({
                "background-image": "url(" + imageUrl + ")",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>

@endpush
