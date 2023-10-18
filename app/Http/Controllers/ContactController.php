<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Brand;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {
        $brand = Brand::all();
        return view('contact-us', compact('brand'));
    }

    public function sendEmail(Request $request){
        if (auth()->check() && Auth()->user()->userrole == "Customer"){
            $details = [
                'name' => Auth()->user()->customer->FirstName ." ". Auth()->user()->customer->LastName,
                'email' => Auth()->user()->customer->email,
                'phone' => Auth()->user()->customer->MobileNumber,
                'msg' => $request->msg
            ];
        }else{
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'msg' => $request->msg
            ];
        }

        

        Mail::to('chesterdoliente@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent', 'your message has been sent successfully!');
    }
}
