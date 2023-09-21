@extends('admin.layouts.master')

@section('index-admin-settings')
    <section class="section">

        <div class="section-header">
            <h1>Configure Your Site Settings</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Setup General Settings!</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                    aria-controls="home" aria-selected="true">
                                    <i class="fas fa-cog"></i>General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                    aria-controls="profile" aria-selected="false">
                                    <i class="fas fa-cog"></i>SEO Settings</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                @include('admin.admin-settings.cards.general-setting')
                            </div>
                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                @include('admin.admin-settings.cards.seo-setting')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
