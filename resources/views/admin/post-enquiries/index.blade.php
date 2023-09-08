@extends('admin.layouts.master')

@section('post_enquiries')
    <section class="section">

        <div class="section-header">
            <h1>All Enquiries Received</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Checkout Your Potential Client Enquiries Here!</h4>
            </div>
            <div class="card-body">

                <!-- Display deletion success message if it exists -->
                @if (session('delete-success'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('delete-success') }}
                        </div>
                    </div>
                @endif


                @if ($post_enquiries->isEmpty())
                    <p>No property enquiries found.</p>
                @else
                    @foreach ($post_enquiries as $post_enquiry)
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $post_enquiry->name }}</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show" id="mycard-collapse" style="">
                                <div class="card-body">
                                    NB: Don't forget to add the title of product that's been enquired about.
                                    <p>Email Address: {{ $post_enquiry->email }}</p>
                                    <p>Phone Number: {{ $post_enquiry->phone_no }}</p>
                                    <p>Message: {{ $post_enquiry->message }}</p>
                                    <br>

                                    <form method="POST"
                                        action="{{ route('admin.post-enquiry.destroy', $post_enquiry->id) }}"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type='submit' class="btn btn-danger btn-action"><i
                                                class="fas fa-trash"></i></button>

                                    </form>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $post_enquiries->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>
@endsection
