<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\InquiryProducts;
use App\Models\Settings;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        return view('front.contact_us', compact('settings'));
    }

    public function inquiry()
    {
        $settings = Settings::first();
        return view('front.inquiry', compact('settings'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        // Store the contact inquiry details
        ContactUs::create($request->only(['email', 'phone', 'name', 'description']));

        return redirect()->route('home')->with('success', 'تم إرسال رسالتك بنجاح! شكرًا لتواصلك معنا. سنقوم بالرد على استفسارك في أقرب وقت ممكن.');
    }

    public function successRedirect()
    {
        return view('front.thanks');
    }
}
