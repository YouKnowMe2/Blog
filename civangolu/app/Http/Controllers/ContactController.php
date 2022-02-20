<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessContactMail;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function propertyInquiry(Request $request, $property_id){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|max:255',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message . 'This message has been sent via ' . route('single-property', $property_id) . ' website.';
        $contact->save();

        ProcessContactMail::dispatch($contact);
        return redirect(route('single-property',$property_id))->with('message','Your Message has been sent');
    }
}
