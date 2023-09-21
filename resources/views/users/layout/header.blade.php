<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">

            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ route('view.home') }}"><b>Home</b></a></li>
                    <li><a href="{{ route('view.about') }}"><b>About</b></a></li>
                    <li><a href="{{ route('view.agents') }}"><b>Agents</b></a></li>
                    <li><a href="{{ route('view.blog') }}"><b>Blog</b></a></li>
                    <li><a href="{{ route('view.contact') }}"><b>Contact</b></a></li>
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
        <a href="{{ route('view.home') }}"><img src="{{ asset($settings['site_logo']) }}" alt="Realestate"></a>

        <ul class="pull-right">
            <li><a href="{{ route('view.buysalerent') }}">Buy</a></li>
            <li><a href="{{ route('view.buysalerent') }}">Sale</a></li>
            <li><a href="{{ route('view.buysalerent') }}">Rent</a></li>
        </ul>
    </div>
    <!-- #Header Starts -->
</div>
