@extends('users.layout.master')

@section('property-details')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Buy</span>
            <h2>Buy</h2>
        </div>
    </div>
    <!-- banner -->

    <div class="container">

        <!-- Display successfully sent enquiry message if it exists -->
        @if (session('enquiry-success'))
            <div class="alert alert-custom alert-success alert-dismissible show" data-dismiss="alert">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span style="background-color: white">×</span>
                    </button>
                    {{ session('enquiry-success') }}
                </div>
            </div>
        @endif

        <div class="properties-listing spacer">

            <div class="row">
                <div class="col-lg-3 col-sm-4 hidden-xs">

                    <div class="hot-properties hidden-xs">
                        <h4>Hot Properties</h4>

                        @foreach ($filteredHotProperties as $hotProperty)
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"><img
                                        src="{{ asset('uploads/properties/' . $hotProperty->image) }}"
                                        class="img-responsive img-circle" alt="properties" /></div>
                                <div class="col-lg-8 col-sm-7">
                                    <h5><a href="{{ route('view.home') }}">{{ $hotProperty->property_type }}</a></h5>
                                    <p class="price">₦{{ number_format($hotProperty->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="advertisement">
                        <h4>Advertisements</h4>
                        <img src={{ asset('users/images/advertisements.jpg') }} class="img-responsive" alt="advertisement">

                    </div>

                </div>

                <div class="col-lg-9 col-sm-8 ">

                    <h2>{{ $property->property_type }}</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="property-images">
                                <!-- Slider Starts -->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators hidden-xs">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <!-- Item 1 -->
                                        <div class="item active">
                                            <img src={{ asset('users/images/properties/4.jpg') }} class="properties"
                                                alt="properties" />
                                        </div>

                                        <!-- Item 2 -->
                                        <div class="item">
                                            <img src={{ asset('users/images/properties/2.jpg') }} class="properties"
                                                alt="properties" />
                                        </div>

                                        <!-- Item 3 -->
                                        <div class="item">
                                            <img src={{ asset('users/images/properties/1.jpg') }} class="properties"
                                                alt="properties" />
                                        </div>

                                        <!-- Item 4 -->
                                        <div class="item ">
                                            <img src={{ asset('users/images/properties/3.jpg') }} class="properties"
                                                alt="properties" />

                                        </div>

                                    </div>
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
                                            class="glyphicon glyphicon-chevron-left"></span></a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span
                                            class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                                <!-- #Slider Ends -->

                            </div>

                            <div class="spacer">
                                <h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
                                <p> {{ $property->property_details }} </p>

                            </div>
                            <div>
                                <h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
                                <div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no"
                                        marginheight="0" marginwidth="0"
                                        src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12  col-sm-6">
                                <div class="property-info">
                                    <p class="price">₦ {{ number_format($property->price, 2) }}</p>
                                    <p class="area"><span class="glyphicon glyphicon-map-marker"></span>
                                        {{ $property->location }}
                                    </p>

                                    <div class="profile">
                                        <span class="glyphicon glyphicon-user"></span> Agent Details
                                        <p>{{ $property->agent_name }}<br>{{ $property->agent_no }}</p>
                                    </div>
                                </div>

                                <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
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

                            </div>

                            <div class="col-lg-12 col-sm-6 ">
                                <div class="enquiry">
                                    <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
                                    <form role="form" method="POST"
                                        action="{{ route('admin.post-enquiry.store') }}">
                                        @csrf
                                        <input type="text" class="form-control" name='name'
                                            placeholder="Your full name" required />
                                        <input type="text" class="form-control" name='property_title'
                                            placeholder="Property title you're enquiring..." required />
                                        <input type="text" class="form-control" name="email"
                                            placeholder="you@youremail.com" required />
                                        <input type="text" class="form-control" name="phone_no"
                                            placeholder="your phone number" required />
                                        <textarea rows="6" class="form-control" name="message" placeholder="What's on your mind?" required></textarea>

                                        <button type="submit" class="btn btn-primary">Send Message</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
