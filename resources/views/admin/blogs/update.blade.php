@extends('admin.layouts.master')

@section('update-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Update Blog Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">
                <!-- This is a form to update a property-->
                <form method="POST" action="{{ route('admin.blog.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="featured" class="custom-switch-input" {{ $blog->featured ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Featured</span>
                            </label>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="title">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-group col-md-5">
                                    <input type="file" class="form-control" name="image" id="uploadImage">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="content">Content</label>

                            <div class="col-sm-12 col-md-7">

                                <textarea class="form-control" name="content" id="content">{{ $blog->content }}</textarea>
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

