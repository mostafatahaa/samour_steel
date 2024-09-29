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
        return view('front.contactus', compact('settings'));
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
            'company_name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'product_ids' => ['nullable', 'string']
        ]);

        // Store the contact inquiry details
        $contactUs = ContactUs::create($request->only(['email', 'phone', 'company_name', 'description']));

        // Process the product IDs
        if ($request->filled('product_ids')) {
            $productIds = explode(',', $request->input('product_ids'));

            // Store each product ID related to this inquiry
            foreach ($productIds as $productId) {
                InquiryProducts::create([
                    'contact_us_id' => $contactUs->id,
                    'product_id' => $productId
                ]);
            }
        }

        return redirect()->route('thanks');
    }

    public function successRedirect()
    {
        return view('front.thanks');
    }
}
