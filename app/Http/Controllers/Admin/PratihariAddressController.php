<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PratihariAddress;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class PratihariAddressController extends Controller
{
    public function pratihariAddress()
    {
        return view('admin.pratihari-address-details');
    }

   
    public function saveAddress(Request $request)
{
   

    try {
        // Create a new address entry
        $address = new PratihariAddress();
        $address->pratihari_id = $request->pratihari_id;
        $address->sahi = $request->sahi;
        $address->landmark = $request->landmark;
        $address->post = $request->post;
        $address->police_station = $request->police_station;
        $address->pincode = $request->pincode;
        $address->district = $request->district;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->address = $request->address;

        // Check if the checkbox is unchecked, meaning both addresses should be the same
        if (!$request->has('differentAsPermanent')) {
            $address->per_address = $request->per_address;
            $address->per_sahi = $request->sahi;
            $address->per_landmark = $request->landmark;
            $address->per_post = $request->post;
            $address->per_police_station = $request->police_station;
            $address->per_pincode = $request->pincode;
            $address->per_district = $request->district;
            $address->per_state = $request->state;
            $address->per_country = $request->country;
        } else {
            // If checkbox is checked, save entered permanent address
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

        return redirect()->back()->with('success', 'Address saved successfully.');
    } catch (\Exception $e) {
        Log::error('Error saving address: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to save address. Please try again.');
    }
}

}
