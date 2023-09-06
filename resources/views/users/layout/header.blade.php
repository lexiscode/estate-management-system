<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ route('view.home') }}">Home</a></li>
                    <li><a href="{{ route('view.about') }}">About</a></li>
                    <li><a href="{{ route('view.agents') }}">Agents</a></li>
                    <li><a href="{{ route('view.blog') }}">Blog</a></li>
                    <li><a href="{{ route('view.contact') }}">Contact</a></li>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>

<!-- #Header Starts -->

<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a>

        <ul class="pull-right">
            <li><a href="{{ route('view.buysalerent') }}">Buy</a></li>
            <li><a href="{{ route('view.buysalerent') }}">Sale</a></li>
            <li><a href="{{ route('view.buysalerent') }}">Rent</a></li>
        </ul>
    </div>
    <!-- #Header Starts -->
</div>
