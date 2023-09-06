<div class="footer">

    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Information</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ route('view.about') }}">About</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ route('view.agents') }}">Agents</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ route('view.blog') }}">Blog</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ route('view.contact') }}">Contact</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{ route('admin.login.index') }}">*Admin Login*</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>
                <form class="form-inline" role="form" action="POST">
                    @csrf
                    <input type="text" placeholder="Enter Your email address" class="form-control" name="email" required>
                    <button class="btn btn-success" type="submit">Notify Me!</button>
                </form>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Follow us</h4>
                <a href="#"><img src={{ asset("users/images/facebook.png") }} alt="facebook"></a>
                <a href="#"><img src={{ asset("users/images/twitter.png") }} alt="twitter"></a>
                <a href="#"><img src={{ asset("users/images/linkedin.png") }} alt="linkedin"></a>
                <a href="#"><img src={{ asset("users/images/instagram.png") }} alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                <p><b>Bootstrap Realestate Inc.</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span>8290 Walk Street, Australia<br>
                    <span class="glyphicon glyphicon-envelope"></span>hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone"></span>(123) 456-7890
                </p>
            </div>
        </div>

        <p class="copyright">Copyright 2023. All rights reserved.</p>

    </div>
</div>


