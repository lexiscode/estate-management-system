@extends('users.layout.master')

@section('contact')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{ route('view.home') }}">Home</a> / Contact Us</span>
            <h2>Contact Us</h2>
        </div>
    </div>
    <!-- banner -->

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
        <br> <br>
    @endif

    <div class="container">
        <div class="spacer">
            <div class="row contact">
                <div class="col-lg-6 col-sm-6 ">
                    <form method="POST" action="{{ route('admin.post-enquiry.store') }}">
                        @csrf
                        <input type="text" class="form-control" name="name" placeholder="Your full name" required>
                        <input type="text" class="form-control" name="email" placeholder="Your email address" required>
                        <input type="text" class="form-control" name="phone_no" placeholder="Your contact number" required>

                        <textarea rows="6" class="form-control" name="message" placeholder="Your message to us..." required></textarea>

                        <input type="hidden" class="form-control" name="contact_page" value="Yes" >
                        <button type="submit" class="btn btn-success">Send Message</button>

                    </form>

                </div>
                <div class="col-lg-6 col-sm-6 ">
                    <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
