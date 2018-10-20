<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts = Contact::all();

        return view('contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        Contact::create(
            [
            'email' => $request['email'],
            'message' => $request['message']
            ]
        );

       $contact = [];
       $contact['name'] = $request->get('name');
       $contact['email'] = $request->get('email');
       $contact['message'] = $request->get('message');

       Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));

      return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');;
    }
}
