@extends('users.layout.master')

@section('home')

    <div class="">

        <div id="slider" class="sl-slider-wrapper">

            <div class="sl-slider">

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25"
                    data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-1"></div>
                        <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia
                            </p>
                            <p>Until he extends the circle of his compassion to all living things, man will not himself find
                                peace.</p>
                            <cite>$ 20,000,000</cite>
                        </blockquote>
                    </div>
                </div>

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15"
                    data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-2"></div>
                        <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia
                            </p>
                            <p>Until he extends the circle of his compassion to all living things, man will not himself find
                                peace.</p>
                            <cite>$ 20,000,000</cite>
                        </blockquote>
                    </div>
                </div>

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3"
                    data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-3"></div>
                        <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia
                            </p>
                            <p>Until he extends the circle of his compassion to all living things, man will not himself find
                                peace.</p>
                            <cite>$ 20,000,000</cite>
                        </blockquote>
                    </div>
                </div>

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25"
                    data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-4"></div>
                        <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia
                            </p>
                            <p>Until he extends the circle of his compassion to all living things, man will not himself find
                                peace.</p>
                            <cite>$ 20,000,000</cite>
                        </blockquote>
                    </div>
                </div>

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10"
                    data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-5"></div>
                        <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia
                            </p>
                            <p>Until he extends the circle of his compassion to all living things, man will not himself find
                                peace.</p>
                            <cite>$ 20,000,000</cite>
                        </blockquote>
                    </div>
                </div>
            </div><!-- /sl-slider -->



            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </nav>

        </div><!-- /slider-wrapper -->

    </div>

    <div class="banner-search">
        <div class="container">
            <!-- banner -->
            <h3>Buy, Sale & Rent</h3>
            <div class="searchbar">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Search of Properties">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 ">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Property</option>
                                    <option>Apartment</option>
                                    <option>Building</option>
                                    <option>Office Space</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <button class="btn btn-success" onclick="window.location.href='buysalerent.php'">Find
                                    Now</button>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                        <p>Join now and get updated with all the properties deals.</p>
                        <button class="btn btn-info" data-toggle="modal" data-target="#loginpop">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="loginpop" class="modal fade">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-content">
                    <div class="row">
                        <div class="col-sm-6 login">
                            <h4>Login</h4>

                            @if (session()->has('success'))
                                <p style="text-align:center; color: green">
                                    <i>{{ session()->get('success') }}</i>
                                </p>
                            @endif

                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                    placeholder="Password" name="password" required>
                            </div>
                            <div class="checkbox">
                                <label for="remember">
                                    <input type="checkbox" name="remember" id="remember"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Sign in</button>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('user.forgot-password'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('user.forgot-password') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <h4>New User Sign Up</h4>
                            <p>Join today and get updated with all the properties deal happening around.</p>
                            <a class="btn btn-info" onclick="window.location.href='{{ route('register') }}'">Join
                                Now</a>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- banner -->
    <div class="container">
        <div class="properties-listing spacer"> <a href="{{ route('view.buysalerent') }}" class="pull-right viewall">View
                All Listing</a>
            <h2>Featured Properties</h2>
            <div id="owl-example" class="owl-carousel">

                @foreach ($properties as $property)

                    <div class="properties">
                        <div class="image-holder">
                            <img src="{{ asset('uploads/properties/' . $property->image) }}" class="img-responsive" alt="property-image" />
                            @if ($property->status === 'Rent')
                            <div class="status rent">{{ $property->status }}</div>
                            @elseif ($property->status === 'Sold')
                            <div class="status sold">{{ $property->status }}</div>
                            @elseif ($property->status === 'New')
                            <div class="status new">{{ $property->status }}</div>
                            @endif
                        </div>
                        <h4><a href="{{ route('view.property-detail', $property->id) }}">{{ $property->title }}</a></h4>
                        <p class="price">Price: ₦{{ number_format($property->price, 2) }}</p>
                        <div class="listing-detail">
                            @if ($property->availability->bedroom == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bedroom">{{ $property->availability->bedroom }}</span>
                            @endif
                            @if ($property->availability->livingroom == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{ $property->availability->livingroom }}</span>
                            @endif
                            @if ($property->availability->parking == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{ $property->availability->parking }}</span>
                            @endif
                            @if ($property->availability->kitchen == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{ $property->availability->kitchen }}</span>
                            @endif
                            @if ($property->availability->storeroom == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Store Room">{{ $property->availability->storeroom }}</span>
                            @endif
                            @if ($property->availability->bathroom == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bathroom">{{ $property->availability->bathroom }}</span>
                            @endif
                            @if ($property->availability->diningroom == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Dining Room">{{ $property->availability->diningroom }}</span>
                            @endif
                            @if ($property->availability->balcony == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Balcony">{{ $property->availability->balcony }}</span>
                            @endif
                            @if ($property->availability->guestroom == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Guest Room">{{ $property->availability->guestroom }}</span>
                            @endif
                            @if ($property->availability->closets == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Closets">{{ $property->availability->closets }}</span>
                            @endif
                            @if ($property->availability->pantry == true)
                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Pantry">{{ $property->availability->pantry }}</span>
                            @endif
                        </div>
                        <a class="btn btn-primary" href="{{ route('view.property-detail', $property->id) }}">View Details</a>
                    </div>

                @endforeach

            </div>
        </div>

        <div class="spacer">
            <div class="row">
                <div class="col-lg-6 col-sm-9 recent-view">
                    <h3>About Us</h3>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                        Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in
                        their exact original form, accompanied by English versions from the 1914 translation by H.
                        Rackham.<br><a href="{{ route('view.about') }}">Learn More</a></p>

                </div>
                <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
                    <h3>Recommended Properties</h3>
                    <div id="myCarousel" class="carousel slide">

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            @foreach ($filteredRecommendedProperties as $recommendedProperty)
                            <div class="row">
                                <div class="col-lg-4"><img src="{{ asset('uploads/properties/' . $recommendedProperty->image) }}"
                                        class="img-responsive" alt="properties" /></div>
                                <div class="col-lg-8">
                                    <h5><a href="{{ route('view.property-detail', $recommendedProperty->id) }}">{{ $recommendedProperty->property_type }}</a></h5>
                                    <p class="price">₦{{ number_format($recommendedProperty->price, 2) }}</p>
                                    <a href="{{ route('view.property-detail', $recommendedProperty->id) }}" class="more">More Detail</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
