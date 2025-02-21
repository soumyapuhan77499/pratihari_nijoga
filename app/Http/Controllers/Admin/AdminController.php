<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    private $apiUrl = 'https://auth.otpless.app';
    private $clientId = 'Q9Z0F0NXFT3KG3IHUMA4U4LADMILH1CB';
    private $clientSecret = '5rjidx7nav2mkrz9jo7f56bmj8zuc1r2';

    public function showOtpForm()
    {
        return view('admin.admin-login');
    }

    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function sendOtp(Request $request)
    {
        $phoneNumber = '+91' . $request->input('phone');
        $admin = Admin::where('mobile_no', $phoneNumber)->first();

        if (!$admin) {
            return redirect()->back()->with('message', 'Your number is not registered. Please contact the Super Admin.');
        }

        $client = new Client();
        $url = $this->apiUrl . '/auth/otp/v1/send';

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'clientId'      => $this->clientId,
                    'clientSecret'  => $this->clientSecret,
                ],
                'json' => ['phoneNumber' => $phoneNumber],
            ]);

            $body = json_decode($response->getBody(), true);

            if (isset($body['orderId'])) {
                session(['otp_order_id' => $body['orderId'], 'otp_phone' => $phoneNumber]);
                return redirect()->back()->with('otp_sent', true)->with('message', 'OTP sent successfully');
            } else {
                return redirect()->back()->with('message', 'Failed to send OTP. Try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to send OTP due to an error.');
        }
    }

  
public function verifyOtp(Request $request)
{
    $orderId = session('otp_order_id');
    $otp = $request->input('otp');
    $phoneNumber = session('otp_phone');

    if (!$orderId || !$phoneNumber) {
        return back()->with('error', 'Session expired. Please request a new OTP.');
    }

    $client = new Client();
    $url = "{$this->apiUrl}/auth/otp/v1/verify";

    try {
        $response = $client->post($url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'clientId' => $this->clientId,
                'clientSecret' => $this->clientSecret,
            ],
            'json' => [
                'orderId' => $orderId,
                'otp' => $otp,
                'phoneNumber' => $phoneNumber,
            ],
        ]);

        $body = json_decode($response->getBody(), true);

        if (isset($body['isOTPVerified']) && $body['isOTPVerified']) {
            $admin = Admin::where('mobile_no', $phoneNumber)->first();

            if ($admin) {
                Auth::guard('admins')->login($admin); 

                return redirect()->route('admin.dashboard')->with('success', 'Login successful.');
            } else {
                return back()->with('error', 'User not found. Please register first.');
            }
        } else {
            return back()->with('error', 'Invalid OTP. Please try again.');
        }

    } catch (\GuzzleHttp\Exception\ClientException $e) {
        $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
        return back()->with('error', $responseBody['message'] ?? 'Invalid request.');
    } catch (\GuzzleHttp\Exception\ServerException $e) {
        return back()->with('error', 'Server error. Please try again later.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

}

