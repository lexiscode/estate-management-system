@extends('users.layout.master')

@section('blog-detail')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Blogs</span>
            <h2>Blogs</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer blog">
            <div class="row">
                <div class="col-lg-8">

                    <!-- blog detail -->
                    <h2>{{ $blog->title }}</h2>
                    <div class="info">Posted on: {{ $blog->created_at }}</div>
                    <img src="{{ asset('uploads/blogs/' . $blog->image) }}" class="thumbnail img-responsive"
                        alt="blog title">
                    <p>{{ $blog->content }}</p>
                    <!-- blog detail -->


                </div>
                <div class="col-lg-4 visible-lg">

                    <!-- tabs -->
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class=""><a href="#tab1" data-toggle="tab">Recent Post</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab">Most Popular</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab1">
                                <ul class="list-unstyled">
                                    <!-- Recent Post tab -->
                                    @foreach ($blogs as $blog)
                                    <li>
                                        <h5><a href="{{ route('view.blog-detail', $blog->id) }}">{{ $blog->title }}</a>
                                        </h5>
                                        <div class="info">Posted on: {{ $blog->created_at }}</div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <ul class="list-unstyled">
                                    @foreach ($featuredBlogs as $f_blog)
                                    <li>
                                        <h5><a href="{{ route('view.blog-detail', $f_blog->id) }}">{{ $f_blog->title }}</a></h5>
                                        <div class="info">Posted on: {{ $f_blog->created_at }}</div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
