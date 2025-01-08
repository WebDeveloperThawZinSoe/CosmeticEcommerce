<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Password as PasswordFacade;

class UserProfileController extends Controller
{
    // Display profile settings
    public function index()
    {
        return view('customer.profile');
    }

    // Change user password
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }

    // Change user email
    public function changeEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'unique:users,email,'.Auth::id()],
        ]);

        $user = Auth::user();
        $user->email = $validatedData['email'];
        $user->save();

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'Email changed successfully. Please verify your new email address.');
    }

    //vip
    public function vip(){
        return view("customer.vip");
    }
}
