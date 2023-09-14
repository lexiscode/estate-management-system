@extends('users.layout.master')

@section('blog')
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
                <div class="col-lg-8 col-sm-12 ">

                    <!-- blog list -->
                    @foreach ($blogs as $blog)

                    <div class="row">
                        <div class="col-lg-4 col-sm-4 ">
                            <a href="{{ route('view.blog-detail', $blog->id) }}" class="thumbnail">
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="blog title">
                            </a>
                        </div>
                        <div class="col-lg-8 col-sm-8 ">
                            <h3><a href="{{ route('view.blog-detail', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <div class="info">Posted on: {{ $blog->created_at }}</div>
                            <p>{{ Str::limit($blog->content, 200) }}</p>
                            <a href="{{ route('view.blog-detail', $blog->id) }}" class="more">Read More</a>
                        </div>
                    </div>

                    @endforeach


                </div>

                <div class="col-lg-4 visible-lg">

                    <!-- tabs -->
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class=""><a href="#tab1" data-toggle="tab">Recent Post</a></li>
                            <li class="active"><a href="#tab2" data-toggle="tab">Most Popular</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab1">
                                <ul class="list-unstyled">
                                    <!-- Recent Post tab -->
                                    @foreach ($blogs as $blog)
                                    <li>
                                        <h5><a href="{{ route('view.blog-detail', $blog->id) }}">{{ $blog->title }}</a></h5>
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
