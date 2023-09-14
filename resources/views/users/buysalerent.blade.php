@extends('users.layout.master')

@section('buysalerent')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Buy, Sale & Rent</span>
            <h2>Buy, Sale & Rent</h2>
        </div>
    </div>
    <!-- banner -->

    <div class="container">
        <div class="properties-listing spacer">

            <div class="row">
                <div class="col-lg-3 col-sm-4 ">

                    <div class="search-form">
                        <h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
                        <input type="text" class="form-control" placeholder="Search of Properties">
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <select class="form-control">
                                    <option>Property Type</option>
                                    <option>Apartment</option>
                                    <option>Building</option>
                                    <option>Office Space</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary">Find Now</button>

                    </div>



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

                </div>

                <div class="col-lg-9 col-sm-8">
                    <div class="sortby clearfix">
                        <div class="pull-left result">Total Properties: {{ $countProperties }} </div>
                        <div class="pull-right">
                            <select class="form-control">
                                <option>Sort by</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">

                        <!-- properties -->

                        @foreach ($properties as $property)
                            <div class="col-lg-4 col-sm-6">
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
                            </div>

                        @endforeach

                    </div>

                    <!-- Simple pagination links -->
                    <div class="pagination" style="margin: 0 auto; margin-top: 10px; padding-left: 350px;">
                        {{ $properties->links('pagination::simple-bootstrap-4') }}
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
