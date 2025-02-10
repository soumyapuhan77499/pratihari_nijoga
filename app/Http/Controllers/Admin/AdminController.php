<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.admin-login');
    } 
    
    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function AdminRegister()
    {
        return view('admin.admin-register');
    }

    public function saveAdminRegister(Request $request)
{
    try {
        // Validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phonenumber' => 'required|string|unique:admins,phonenumber|max:15',
            'email' => 'required|email|unique:admins,email|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save the Admin
        $admin = new Admin();
        $admin->userid = "USER" . rand(1000, 9999);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->phonenumber = $request->phonenumber;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password); // Encrypt password
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Admin registered successfully!');
    
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
    }
}

public function saveAdminLogin(Request $request)
{
    try {
        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find Admin by Email
        $admin = Admin::where('email', $request->email)->first();

        // Check Password
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store Admin in Session
            session(['admin_id' => $admin->id, 'admin_email' => $admin->email]);

            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password!')->withInput();
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
    }
}

public function adminLogout()
{
    session()->forget(['admin_id', 'admin_email']);
    return redirect()->route('admin.AdminLogin')->with('success', 'Logged out successfully!');
}

public function showResetForm()
{
    return view('admin.admin-forgot');
}

public function resetPassword(Request $request)
{
    try {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Find the user
        $user = Admin::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found!'])->withInput();
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.AdminLogin')->with('success', 'Password has been reset successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Something went wrong. Please try again!'])->withInput();
    }
}

}
