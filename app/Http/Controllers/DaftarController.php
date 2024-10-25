<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Admin;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'password' => 'required|confirmed|min:7', // Password confirmation validation
        ]);

        // Hash the password before saving
        $password = Hash::make($validatedData['password']);

        // Check the email domain to determine the type of user
        if (strpos($validatedData['email'], '@admin.com') !== false) {
            // Save to the Admin table
            Admin::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'password' => $password,
            ]);
        } elseif (strpos($validatedData['email'], '@seller.com') !== false) {
            // Save to the Seller table
            Seller::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'password' => $password,
                'location_id' => 1, // Assume location_id is 1 for now, or handle location input separately
            ]);
        } elseif (strpos($validatedData['email'], '@gmail.com') !== false) {
            // Save to the Customer table
            Customer::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'password' => $password,
            ]);
        } else {
            // If email does not match any criteria, return an error message
            return redirect()->back()->withErrors(['email' => 'Invalid email domain']);
        }

        // Redirect back with success message
        return redirect()->route('login')->with('success', 'Account created successfully!');
    }
}