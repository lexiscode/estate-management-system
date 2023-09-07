<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

use App\Http\Requests\SendResetLinkRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Models\Admin;
use Illuminate\Validation\Rules;
use App\Mail\AdminSendResetLinkMail;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.admin.forgot-password');
    }


    public function sendResetLink(SendResetLinkRequest $request)
    {
        $token = \Str::random(64);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'A mail has been sent to your email.');

    }


    public function resetPassword($token)
    {
        // Retrieve the email from the query string in the browser
        $email = request('email');

        return view('auth.admin.reset-password', compact('email', 'token'));
    }


    public function handleResetPassword(AdminResetPasswordRequest $request)
    {
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if(!$admin){
            return back()->with('error', 'Invalid token');
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login.index')->with('success', 'Password reset successful. Try login now.');
    }

}
