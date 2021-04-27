<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function notice() {
        return view('auth.verify-email');
    }

    public function handle(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/login');
    }

    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }

}
