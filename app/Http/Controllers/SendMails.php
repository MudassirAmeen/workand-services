<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactResponse;
use App\Mail\Newsletter;
use App\Models\NewsLetter as ModelsNewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMails extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Contact($data));
            Mail::to($request->input('email'))->send(new ContactResponse($data));
            return redirect()->back()->with('success', 'Your message has been sent.');
        } catch (\Exception $th) {
            return redirect()->back()->with('danger', 'Something went wrong.');
        }
    }

    public function newsLetter(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required|email'
        ]);

        $newsletter = ModelsNewsLetter::where('email', $request->email)->first();

        if ($newsletter == null) {
            ModelsNewsLetter::create($validate)->save();
        }

        $data = [
            'email' => $request->input('email')
        ];

        try {
            Mail::to($request->input('email'))->send(new Newsletter($data));
            return redirect()->back()->with('success', 'Successfully Subscribed');
        } catch (\Exception $th) {
            return redirect()->back()->with('danger', 'Something went wrong');
        }
    }
}
