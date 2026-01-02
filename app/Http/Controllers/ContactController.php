<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInquiry;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 2. Send the email to YOURSELF
        // Replace with your actual email address
        Mail::to(config('portfolio.email'))->send(new ContactInquiry($validated));

        // 3. Return a JSON success response
        return response()->json(['message' => 'Email sent successfully!']);
    }
}