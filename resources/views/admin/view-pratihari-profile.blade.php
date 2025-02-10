@extends('layouts.app')

@section('styles')
    <!--- Internal Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--  smart photo master css -->
    <link href="{{ asset('assets/plugins/SmartPhoto-master/smartphoto.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">PROFILE</span>
        </div>
        <div class="justify-content-center mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body d-md-flex">
                    <div class="">
                        <span class="profile-image pos-relative">
                            <img class="br-5" alt="" src="{{ }}">
                            <span class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span>
                        </span>
                    </div>
                    <div class="my-md-auto mt-4 prof-details">
                        <h4 class="font-weight-semibold ms-md-4 ms-0 mb-1 pb-0"></h4>
                        <p class="tx-13 text-muted ms-md-4 ms-0 mb-2 pb-2 ">
                            <span class="me-3"><i class="far fa-address-card me-2"></i></span>
                            <span class="me-3"><i class="fa fa-taxi me-2"></i></span>
                            <span><i class="far fa-flag me-2"></i></span>
                        </p>
                        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-phone me-2"></i></span><span
                                class="font-weight-semibold me-2">Phone:</span><span></span>
                        </p>
                        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span
                                class="font-weight-semibold me-2">Email:</span><span></span>
                        </p>
                        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-globe me-2"></i></span><span
                                class="font-weight-semibold me-2">Whatsapp</span><span></span>
                        </p>
                    </div>
                </div>
                <div class="card-footer py-0">
                    <div class="profile-tab tab-menu-heading border-bottom-0">
                        <nav class="nav main-nav-line p-0 tabs-menu profile-nav-line border-0 br-5 mb-0	">
                            <a class="nav-link  mb-2 mt-2 active" data-bs-toggle="tab" href="#personal">Personal</a>
                            <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#family">Family</a>
                            <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#id">Id Card</a>
                            <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#address">Address</a>
                            <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#occupation">Occupation</a>
                            <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#seba">Seba</a>
                            <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#social">Social Media</a>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="custom-card main-content-body-profile">
                <div class="tab-content">
                    <div class="main-content-body tab-pane  active" id="personal">
                        <div class="card">

                        </div>
                    </div>
                    <div class="main-content-body tab-pane border-top-0" id="family">
                        <div class="card">
                            <div class="row row-sm">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card custom-card border">
                                        <div class="card-body  user-lock text-center">
                                            <div class="dropdown text-end">
                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="true"> <i
                                                        class="fe fe-more-vertical"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow"> <a
                                                        class="dropdown-item" href="javascript:void(0);"><i
                                                            class="fe fe-message-square me-2"></i>
                                                        Message</a> <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item"
                                                        href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="fe fe-trash-2 me-2"></i> Delete</a>
                                                </div>
                                            </div>
                                            <a href="{{ url('profile') }}">
                                                <img alt="avatar" class="rounded-circle"
                                                    src="{{ asset('assets/img/faces/1.jpg') }}">
                                                <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">James
                                                    Thomas</h4>
                                                <span class="text-muted">Web designer</span>
                                                <div class="mt-3 d-flex mx-auto text-center justify-content-center">
                                                    <span class="btn btn-icon me-3 btn-facebook">
                                                        <span class="btn-inner--icon"> <i
                                                                class="bx bxl-facebook tx-18 tx-prime"></i>
                                                        </span>
                                                    </span>
                                                    <span class="btn btn-icon me-3">
                                                        <span class="btn-inner--icon"> <i
                                                                class="bx bxl-twitter tx-18 tx-prime"></i>
                                                        </span>
                                                    </span>
                                                    <span class="btn btn-icon me-3">
                                                        <span class="btn-inner--icon"> <i
                                                                class="bx bxl-linkedin tx-18 tx-prime"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-content-body  tab-pane border-top-0" id="id">
                        <div class="card">

                        </div>
                    </div>
                    <div class="main-content-body  border tab-pane border-top-0" id="address">
                        <div class="card">

                        </div>
                    </div>
                    <div class="main-content-body tab-pane border-top-0" id="occupation">
                        <div class="card">

                        </div>
                    </div>
                    <div class="main-content-body tab-pane  border-0" id="seba">
                        <div class="card">

                        </div>
                    </div>
                    <div class="main-content-body tab-pane  border-0" id="social">
                        <div class="card">
                            <div class="p-4">
                                <label class="main-content-label tx-13 mg-b-20">Social</label>
                                <div class="d-lg-flex">
                                    <div class="mg-md-r-20 mg-b-10">
                                        <div class="main-profile-social-list">
                                            <div class="media">
                                                <div
                                                    class="media-icon bg-primary-transparent text-primary">
                                                    <i class="icon ion-logo-github"></i>
                                                </div>
                                                <div class="media-body"> <span>Github</span> <a
                                                        href="">github.com/spruko</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-md-r-20 mg-b-10">
                                        <div class="main-profile-social-list">
                                            <div class="media">
                                                <div
                                                    class="media-icon bg-success-transparent text-success">
                                                    <i class="icon ion-logo-twitter"></i>
                                                </div>
                                                <div class="media-body"> <span>Twitter</span> <a
                                                        href="">twitter.com/spruko.me</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-md-r-20 mg-b-10">
                                        <div class="main-profile-social-list">
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info">
                                                    <i class="icon ion-logo-linkedin"></i>
                                                </div>
                                                <div class="media-body"> <span>Linkedin</span> <a
                                                        href="">linkedin.com/in/spruko</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-md-r-20 mg-b-10">
                                        <div class="main-profile-social-list">
                                            <div class="media">
                                                <div
                                                    class="media-icon bg-danger-transparent text-danger">
                                                    <i class="icon ion-md-link"></i>
                                                </div>
                                                <div class="media-body"> <span>My Portfolio</span> <a
                                                        href="">spruko.com/</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('scripts')
    <!-- Internal Select2 js-->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- smart photo master js -->
    <script src="{{ asset('assets/plugins/SmartPhoto-master/smartphoto.js') }}"></script>
    <script src="{{ asset('assets/js/gallery.js') }}"></script>
@endsection
