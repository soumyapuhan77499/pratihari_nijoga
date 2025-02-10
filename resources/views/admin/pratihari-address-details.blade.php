@extends('layouts.app')

@section('styles')
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
        }

        .form-control {
            padding-left: 35px;
        }

        .card-header {
            background: linear-gradient(135deg, #f8f19e, #dcf809);
            /* Blue to Purple Gradient */
            color: rgb(51, 101, 251);
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            /* Rounded top corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Adds a shadow effect */
            letter-spacing: 1px;
            /* Improves readability */
            text-transform: uppercase;
            /* Makes it look more professional */
        }

        .btn-primary {
            background: #007bff;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .alert-success {
            font-weight: bold;
            text-align: center;
        }

        /* Increase checkbox size */
        .largerCheckbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-top: 35px;
        }

        .nav-tabs {
            border-bottom: 3px solid #007bff;
            background: linear-gradient(45deg, #a3d4f7, #fb76bf);
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        .nav-tabs .nav-link {
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            padding: 10px 15px;
            margin: 5px 0;
            text-align: center;
            text-transform: uppercase;
        }

        .nav-tabs .nav-link.active {
            background-color: #ff416c;
            color: #fff;
            border: 2px solid #ff416c;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ff416c;
            border: 2px solid #ff416c;
        }

        .tab-content {
            padding: 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs .nav-item {
            flex: 1;

        }

        .nav-tabs .nav-link {
            display: block;
        }

        .nav-tabs .nav-item.col-12 {
            margin-bottom: 10px;
        }

        .nav-tabs .nav-link i {
            color: rgb(29, 5, 108);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .nav-tabs {
                flex-wrap: wrap;
                overflow-x: auto;
                white-space: nowrap;
            }

            .nav-item {
                flex-grow: 1;
                text-align: center;
            }

            .nav-tabs .nav-link {
                padding: 12px 15px;
                font-size: 14px;
            }
        }
        .custom-gradient-btn {
        background: linear-gradient(135deg, #6a11cb, #2575fc); /* Purple to Blue Gradient */
        border: none;
        color: white;
        padding: 12px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .custom-gradient-btn:hover {
        background: linear-gradient(135deg, #2575fc, #6a11cb); /* Reverse Gradient on Hover */
        transform: translateY(-2px);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
    }
    </style>
@endsection

@section('content')
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Error Message -->
    @if (session('error'))
        <div class="alert alert-danger" id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12 mt-2">
            <div class="card shadow-lg">
                <div
                    class="card-header bg-primary text-white d-flex align-items-center justify-content-center text-center w-100">
                    <i class="fa fa-map-marker-alt"
                        style="font-size: 1.8rem; margin-right: 10px; color: rgb(251, 51, 71); text-shadow: 2px 1px 3px rgba(0,0,0,0.4)">
                    </i>
                    <span
                        style="font-size: 1.3rem; font-weight: bold; color: rgb(51, 101, 251); text-shadow: 2px 1px 3px rgba(0,0,0,0.4)">
                        Pratihari Address
                    </span>
                </div>

                <ul class="nav nav-tabs flex-column flex-sm-row mt-2" role="tablist">

                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="profile-tab"  data-toggle="tab" href="{{ route('admin.pratihariProfile') }}" role="tab" aria-controls="profile" aria-selected="true">
                            <i class="fas fa-user" style="color: white"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="family-tab" data-toggle="tab" href="{{ route('admin.pratihariFamily') }}" role="tab" aria-controls="family" aria-selected="true">
                            <i class="fas fa-users"></i> Family
                        </a>
                    </li>
                    
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="id-card-tab" data-toggle="tab" href="{{ route('admin.pratihariIdcard') }}" role="tab" aria-controls="id-card" aria-selected="false">
                            <i class="fas fa-id-card"></i> ID Card
                        </a>
                    </li>
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="address-tab"  style="background-color: rgb(49, 49, 181);color: white" data-toggle="tab" href="{{ route('admin.pratihariAddress') }}" role="tab" aria-controls="address" aria-selected="false">
                            <i class="fas fa-map-marker-alt" style="color: white"></i> Address
                        </a>
                    </li>
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="occupation-tab" data-toggle="tab" href="{{ route('admin.pratihariOccupation') }}" role="tab" aria-controls="occupation" aria-selected="false">
                            <i class="fas fa-briefcase"></i> Occupation
                        </a>
                    </li>
                
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="seba-details-tab" data-toggle="tab" href="{{  route('admin.pratihariSeba') }}" role="tab" aria-controls="seba-details" aria-selected="false">
                            <i class="fas fa-cogs"></i> Seba
                        </a>
                    </li>
                
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="social-media-tab" data-toggle="tab" href="{{ route('admin.pratihariSocialMedia') }}" role="tab" aria-controls="social-media" aria-selected="false">
                            <i class="fas fa-share-alt" style="margin-right: 2px"></i>Social Media 
                        </a>
                    </li>
                   
                </ul>
                <div class="card-body">
                    <form action="{{ route('admin.pratihari-address.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pratihari_id" value="{{ request('pratihari_id') }}">

                        <div class="row">
                            <!-- Current Address Section -->
                            <h4 class="col-12">Current Address</h4>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <label>Sahi</label>
                                    <input type="text" class="form-control" name="sahi" placeholder="Enter your sahi">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-location-arrow"></i>
                                    <label>Landmark</label>
                                    <input type="text" class="form-control" name="landmark"
                                        placeholder="Enter your landmark">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-envelope"></i>
                                    <label>Post Office</label>
                                    <input type="text" class="form-control" name="post"
                                        placeholder="Enter your post office">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-shield-alt"></i>
                                    <label>Police Station</label>
                                    <input type="text" class="form-control" name="police_station"
                                        placeholder="Enter your police station">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-map-pin"></i>
                                    <label>Pincode</label>
                                    <input type="text" class="form-control" name="pincode" placeholder="Enter your pin">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-city"></i>
                                    <label>District</label>
                                    <input type="text" class="form-control" name="district"
                                        placeholder="Enter your district">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-map"></i>
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state"
                                        placeholder="Enter your state">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-globe"></i>
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country"
                                        placeholder="Enter your country">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <i class="fa fa-address-card"></i>
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"></textarea>
                                </div>
                            </div>

                            <!-- Checkbox for Permanent Address -->
                            <div class="col-md-12 mb-3">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input largerCheckbox" id="differentAsPermanent"
                                        name="differentAsPermanent">
                                    <label class="form-check-label" for="differentAsPermanent"
                                        style="margin-top: 5px; margin-left: 10px;">
                                        This address is not the same as the permanent address
                                    </label>
                                </div>
                            </div>

                            <!-- Permanent Address Section (Initially Hidden) -->
                            <div id="permanent-address-section" style="display: none;">
                                <h4 class="col-12">Permanent Address</h4>
                                <div class="row col-12">

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <label>Permanent Sahi</label>
                                            <input type="text" class="form-control" name="per_sahi"
                                                placeholder="Enter your sahi">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-location-arrow"></i>
                                            <label>Permanent Landmark</label>
                                            <input type="text" class="form-control" name="per_landmark"
                                                placeholder="Enter your landmark">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-envelope"></i>
                                            <label>Permanent Post Office</label>
                                            <input type="text" class="form-control" name="per_post"
                                                placeholder="Enter your post office">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-shield-alt"></i>
                                            <label>Permanent Police Station</label>
                                            <input type="text" class="form-control" name="per_police_station"
                                                placeholder="Enter your police station">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-map-pin"></i>
                                            <label>Permanent Pincode</label>
                                            <input type="text" class="form-control" name="per_pincode"
                                                placeholder="Enter your pincode">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-city"></i>
                                            <label>Permanent District</label>
                                            <input type="text" class="form-control" name="per_district"
                                                placeholder="Enter your district">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-map"></i>
                                            <label>Permanent State</label>
                                            <input type="text" class="form-control" name="per_state"
                                                placeholder="Enter your state">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-globe"></i>
                                            <label>Permanent Country</label>
                                            <input type="text" class="form-control" name="per_country"
                                                placeholder="Enter your country">
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <i class="fa fa-address-card"></i>
                                            <label>Permanent Address</label>
                                            <textarea class="form-control" name="per_address" rows="3" placeholder="Enter your address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-lg mt-3 w-50 custom-gradient-btn" style="color: white">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // Wait for the DOM to load
        document.addEventListener("DOMContentLoaded", function() {
            // Hide success message after 5 seconds
            setTimeout(function() {
                let successMessage = document.getElementById("successMessage");
                if (successMessage) {
                    successMessage.style.transition = "opacity 0.5s";
                    successMessage.style.opacity = "0";
                    setTimeout(() => successMessage.style.display = "none", 500);
                }
            }, 5000);

            // Hide error message after 5 seconds
            setTimeout(function() {
                let errorMessage = document.getElementById("errorMessage");
                if (errorMessage) {
                    errorMessage.style.transition = "opacity 0.5s";
                    errorMessage.style.opacity = "0";
                    setTimeout(() => errorMessage.style.display = "none", 500);
                }
            }, 5000);
        });
    </script>

    <script>
        document.getElementById('differentAsPermanent').addEventListener('change', function() {
            var permanentSection = document.getElementById('permanent-address-section');
            permanentSection.style.display = this.checked ? 'block' : 'none';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
