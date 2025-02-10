<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PratihariProfile;
use Illuminate\Support\Facades\Validator;


class PratihariProfileApiController extends Controller
{
    public function saveProfile(Request $request)
{
    // Validate incoming request
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'whatsapp_no' => 'nullable|string',
        'phone_no' => 'nullable|string',
        'blood_group' => 'nullable|string',
        'health_card_no' => 'nullable|string',
        'joining_date' => 'nullable|date',
        'date_of_birth' => 'nullable|date',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Only allow images
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'message' => $validator->errors()->first(),
        ], 400);
    }

    try {
        // Get authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized. Please log in.',
            ], 401);
        }

        // Generate pratihari_id if not exists
        $pratihariId = $user->pratihari_id;

        // Create new profile object
        $pratihariProfile = new PratihariProfile();
        $pratihariProfile->pratihari_id = $pratihariId;
        $pratihariProfile->first_name = $request->first_name;
        $pratihariProfile->middle_name = $request->middle_name;
        $pratihariProfile->last_name = $request->last_name;
        $pratihariProfile->alias_name = $request->alias_name;
        $pratihariProfile->email = $request->email;
        $pratihariProfile->whatsapp_no = $request->whatsapp_no;
        $pratihariProfile->phone_no = $request->phone_no;
        $pratihariProfile->blood_group = $request->blood_group;
        $pratihariProfile->healthcard_no = $request->health_card_no;
        $pratihariProfile->joining_date = $request->joining_date;
        $pratihariProfile->date_of_birth = $request->date_of_birth;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            if (!$profilePhoto->isValid()) {
                throw new \Exception('Profile photo upload failed.');
            }
            $profilePhotoPath = $profilePhoto->store('uploads/profile_photos', 'public');
            $pratihariProfile->profile_photo = $profilePhotoPath;
        }

        // Save profile
        $pratihariProfile->save();

        return response()->json([
            'status' => 200,
            'message' => 'User profile created successfully.',
            'data' => $pratihariProfile
        ], 200);
    } catch (\Exception $e) {
        \Log::error('Error in saving profile: ' . $e->getMessage());

        return response()->json([
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage(),
        ], 500);
    }
}

}
