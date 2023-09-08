@extends('admin.layouts.master')

@section('show-blog-details')
    <section class="section">

        <div class="section-header">
            <h1>Manage Blogs</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Blog Details!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $blog->title }}</h2>
               
                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="Blog Image">

                <p style="color: black;">{{ $blog->content }}</p>

            </div>
        </div>

    </section>
@endsection
