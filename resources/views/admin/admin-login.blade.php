@extends('layouts.custom-app')

@section('styles')
<title>Admin Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.9.0/sweetalert2.min.css">
<style>
    .bg-primary {
        background: linear-gradient(to right, #6a11cb, #2575fc);
    }

    .card-sigin-main {
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        padding: 30px;
    }

    .form-group input {
        height: 50px;
        border-radius: 8px;
    }

    .btn-primary {
        width: 100%;
        height: 50px;
        border-radius: 8px;
    }

    .edit-btn {
        cursor: pointer;
        color: #2575fc;
        text-decoration: underline;
        font-size: 14px;
    }
</style>
@endsection

@section('class')
<div class="bg-primary">
@endsection

@section('content')
<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-10 mx-auto my-auto">
                <div class="card-sigin-main">
                    <div class="text-center mb-4">
                        <a href="#"><img src="{{ asset('assets/img/brand/logo.png') }}" class="sign-favicon ht-40" alt="logo"></a>
                    </div>
                    <div class="main-signup-header">
                        <h3 class="text-center mb-3">Admin Login</h3>

                        @if (session('otp_sent'))
                            <!-- OTP Verification Form -->
                            <form action="{{ route('admin.verifyOtp') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div class="d-flex align-items-center">
                                        <input type="text" id="phone" class="form-control me-2" name="phone" value="{{ session('otp_phone') }}" readonly>
                                        <span class="edit-btn" onclick="enablePhoneEdit()">Edit</span>
                                    </div>
                                </div>
                                <input type="hidden" name="order_id" value="{{ session('otp_order_id') }}">
                                <div class="form-group">
                                    <label>Enter OTP</label>
                                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Verify OTP</button>
                            </form>

                        @else
                            <!-- Phone Number Input Form -->
                            <form action="{{ route('admin.sendOtp') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Enter Your Phone Number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Send OTP</button>
                            </form>
                        @endif

                        <!-- Hidden input for OneSignal player ID -->
                        <input type="hidden" id="onesignal_player_id" name="onesignal_player_id">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.9.0/sweetalert2.all.min.js"></script>
<script>
    // SweetAlert2 for success/error messages
    @if (session('message'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('message') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    // Enable phone edit on OTP screen
    function enablePhoneEdit() {
        let phoneInput = document.getElementById("phone");
        phoneInput.removeAttribute("readonly");
        phoneInput.focus();
    }
</script>

<!-- OneSignal Push Notification -->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        OneSignal.push(function () {
            OneSignal.getUserId().then(function (playerId) {
                if (playerId) {
                    document.getElementById('onesignal_player_id').value = playerId;
                }
            }).catch(function (error) {
                console.error("OneSignal Player ID Error:", error);
            });
        });
    });
</script>
@endsection