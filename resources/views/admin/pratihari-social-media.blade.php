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
            color: rgb(78, 51, 251);
            font-size: 25px;
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
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            /* Purple to Blue Gradient */
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
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            /* Reverse Gradient on Hover */
            transform: translateY(-2px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
        }

        .checkbox-list {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            background: #f9f7f7;
            overflow-y: auto;
        }

        /* Checkbox Styling */
        .form-check-input {
            width: 20px;
            /* Increase Checkbox Size */
            height: 20px;
            /* Increase Checkbox Size */
            cursor: pointer;
            border: 2px solid #3248c7;
            /* Green Border */
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        /* Checkbox Checked State */
        .form-check-input:checked {
            background-color: #0d0d0c;
            /* Green Background */
            border-color: #2d11e9;
        }

        /* Checkbox Hover Effect */
        .form-check-input:hover {
            box-shadow: 0px 0px 8px rgba(53, 104, 246, 0.5);
        }

        /* Label Styling */
        .form-check-label {
            font-size: 14px;
            /* Increase Font Size */
            color: #333;
            padding-left: 10px;
            transition: color 0.3s ease-in-out;
        }

        /* Label Hover Effect */
        .form-check-label:hover {
            color: #218838;
            /* Dark Green Hover */
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Profile Form -->
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header" style="text-shadow: 2px 1px 3px rgba(0,0,0,0.4)"><i class="fas fa-share-alt"
                        style="font-size: 1.8rem; margin-right: 10px; color: rgb(251, 51, 71); text-shadow: 2px 1px 3px rgba(0,0,0,0.4)">
                    </i>Pratihari Social Media</div>

                <ul class="nav nav-tabs flex-column flex-sm-row mt-2" role="tablist">

                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="{{ route('admin.pratihariProfile') }}"
                            role="tab" aria-controls="profile" aria-selected="true">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="family-tab" data-toggle="tab" href="{{ route('admin.pratihariFamily') }}"
                            role="tab" aria-controls="family" aria-selected="true">
                            <i class="fas fa-users"></i> Family
                        </a>
                    </li>

                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="id-card-tab" data-toggle="tab" href="{{ route('admin.pratihariIdcard') }}"
                            role="tab" aria-controls="id-card" aria-selected="false">
                            <i class="fas fa-id-card"></i> ID Card
                        </a>
                    </li>
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="{{ route('admin.pratihariAddress') }}"
                            role="tab" aria-controls="address" aria-selected="false">
                            <i class="fas fa-map-marker-alt"></i> Address
                        </a>
                    </li>
                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="occupation-tab" data-toggle="tab"
                            href="{{ route('admin.pratihariOccupation') }}" role="tab" aria-controls="occupation"
                            aria-selected="false">
                            <i class="fas fa-briefcase"></i> Occupation
                        </a>
                    </li>

                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="seba-details-tab" data-toggle="tab"
                            href="{{ route('admin.pratihariSeba') }}" role="tab" aria-controls="seba-details"
                            aria-selected="false">
                            <i class="fas fa-cogs"></i> Seba
                        </a>
                    </li>

                    <li class="nav-item col-12 col-sm-auto">
                        <a class="nav-link" id="social-media-tab" style="background-color: rgb(49, 49, 181);color: white"
                            data-toggle="tab" href="{{ route('admin.pratihariSocialMedia') }}" role="tab"
                            aria-controls="social-media" aria-selected="false">
                            <i class="fas fa-share-alt" style="margin-right: 2px;color: white"></i>Social Media
                        </a>
                    </li>
                </ul>

                <div class="card-body">
                    <form action="{{ route('admin.social-media.store') }}" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="pratihari_id" value="{{ request('pratihari_id') }}">
                    
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="facebook"><i class="fab fa-facebook"></i> Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control"
                                        placeholder="Enter Facebook URL" value="{{ old('facebook') }}">
                                    <small id="facebook_error" class="text-danger"></small>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="twitter"><i class="fab fa-twitter"></i> Twitter</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control"
                                        placeholder="Enter Twitter URL" value="{{ old('twitter') }}">
                                    <small id="twitter_error" class="text-danger"></small>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="instagram"><i class="fab fa-instagram"></i> Instagram</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                        placeholder="Enter Instagram URL" value="{{ old('instagram') }}">
                                    <small id="instagram_error" class="text-danger"></small>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="linkedin"><i class="fab fa-linkedin"></i> LinkedIn</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                                        placeholder="Enter LinkedIn URL" value="{{ old('linkedin') }}">
                                    <small id="linkedin_error" class="text-danger"></small>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="youtube"><i class="fab fa-youtube"></i> YouTube</label>
                                    <input type="text" name="youtube" id="youtube" class="form-control"
                                        placeholder="Enter YouTube URL" value="{{ old('youtube') }}">
                                    <small id="youtube_error" class="text-danger"></small>
                                </div>
                            </div>
                    
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
    function validateForm() {
        let isValid = true;
        let urlPattern = /^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(:\d+)?(\/\S*)?$/;

        let socialMediaFields = ["facebook", "twitter", "instagram", "linkedin", "youtube"];

        socialMediaFields.forEach(field => {
            let input = document.getElementById(field);
            let errorElement = document.getElementById(field + "_error");

            if (input.value.trim() !== "" && !urlPattern.test(input.value)) {
                errorElement.innerText = "Invalid URL format!";
                isValid = false;
            } else {
                errorElement.innerText = "";
            }
        });

        return isValid;
    }
</script>

@endsection
