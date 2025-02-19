<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PratihariAddress;

class PratihariAddressApiController extends Controller
{
 
    public function saveAddress(Request $request)
    {
        try {
            // Authenticate the user
            $user = Auth::user();
            if (!$user || !$user->pratihari_id) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized. Please log in.',
                ], 401);
            }

            $pratihariId = $user->pratihari_id;

            // Create a new address entry
            $address = new PratihariAddress();
            $address->pratihari_id = $pratihariId; // Fixed variable name issue
            $address->sahi = $request->sahi;
            $address->landmark = $request->landmark;
            $address->post = $request->post;
            $address->police_station = $request->police_station;
            $address->pincode = $request->pincode;
            $address->district = $request->district;
            $address->state = $request->state;
            $address->country = $request->country;
            $address->address = $request->address;

            // Check if 'differentAsPermanent' is unchecked (both addresses should be same)
            if (!$request->has('differentAsPermanent')) {
                $address->per_address = $request->address;
                $address->per_sahi = $request->sahi;
                $address->per_landmark = $request->landmark;
                $address->per_post = $request->post;
                $address->per_police_station = $request->police_station;
                $address->per_pincode = $request->pincode;
                $address->per_district = $request->district;
                $address->per_state = $request->state;
                $address->per_country = $request->country;
            } else {
                // Save entered permanent address
                $address->per_address = $request->per_address;
                $address->per_sahi = $request->per_sahi;
                $address->per_landmark = $request->per_landmark;
                $address->per_post = $request->per_post;
                $address->per_police_station = $request->per_police_station;
                $address->per_pincode = $request->per_pincode;
                $address->per_district = $request->per_district;
                $address->per_state = $request->per_state;
                $address->per_country = $request->per_country;
            }

            $address->save();

            return response()->json([
                'status' => true,
                'message' => 'Address saved successfully.',
                'data' => $address,
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error saving address: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed to save address.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
