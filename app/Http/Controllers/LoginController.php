<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $credentials['email'];
        $password = $credentials['password'];

        // Determine the user type based on email domain
        if (strpos($email, '@admin.com') !== false) {
            // Attempt to authenticate as Admin
            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('admin')->with('success', 'Welcome Admin!');
            }
        } elseif (strpos($email, '@seller.com') !== false) {
            // Attempt to authenticate as Seller
            if (Auth::guard('seller')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('seller.dashboard')->with('success', 'Welcome Seller!');
            }
        } elseif (strpos($email, '@gmail.com') !== false) {
            // Attempt to authenticate as Customer
            if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('user')->with('success', 'Welcome Customer!');
            }
        }

        // If authentication fails, return back to the login page with an error
        return redirect()->back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }
}