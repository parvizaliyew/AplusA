<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Message;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::orderBy('created_at','DESC')->first();
        return view('front.pages.contact',compact('contact'));
    }
    public function contact_post(ContactRequest $request)
    {

        $validated = $request->validate([
            'name'=> 'required|max:255',
            'surname'=> 'required|max:255',
            'email'   => 'required|max:255',
            'phone'   => 'required|max:255',
            'msj'=>'max:1000',
        ]);

        $message = new Message;
        $message->name = $validated['name'];
        $message->surname = $validated['surname'];
        $message->email    = $validated['email'];
        $message->phone    = $request->prefix.' '.$validated['phone'];
        $message->msj = $validated['msj'];


        $email = "eliyevperviz466@gmail.com";
        $title= 'A+A saytindan mesaj var';

        Mail::send('front.mail.sendmail', ['name'=>$request->name,'surname'=>$request->surname,
        'email'   =>$request->email,
        'phone'   =>$request->prefix.' '.$request->phone,'msg' =>$request->msj ],
            function($message) use ($email,$title){
                $message->to($email)->subject($title);

            });
            
            $message->save();
        return redirect()->back()->with('success',__('lang.success'));
    }
}
