<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendWelcomeEmail;
use App\Mail\ContactMail;
use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
	public function index()
    {
    	$items = Contact::latest()->paginate(50);
    	return view('contacts.index', compact('items'));
    }

    public function create()
    {
    	return view('contacts.create');
    }

    public function store(Request $request)
    {
    	$contact = new Contact();
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->phone = $request->phone;
    	$contact->address = $request->address;
    	$contact->save();
    	SendWelcomeEmail::dispatch($contact);
    	return redirect()->route('adcontacts.index');
    }

    public function destroy($id)
    {
    	$contact = Contact::findOrFail($id);
    	$contact->delete();
    	return redirect()->route('adcontacts.index');
    }

}
