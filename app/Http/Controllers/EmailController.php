<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class EmailController extends Controller
{
    public function sendEmail(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'time'=> now()->format('H:i:s d.m.Y')
        ];

//        Store in session
        $messages = session('sent_messages', []);
        array_unshift($messages, $details);
        session(['sent_messages' => $messages]);

//        Mail::to('adiatwork@outlook.com')->send(new ContactMail($details));
//        Mail::to($request->email)->send(new ContactMail($details));
        Mail::to($request->email)->cc('adiatwork@Outlook.com')->send(new ContactMail($details));

        return back()->with('message_sent', 'Dein Nachricht wurde erfolgreich gesendet');
    }

    public function history(){
        $messages = session('sent_messages', []);
        return view('message-history', compact('messages'));
    }

    public function deleteMessage($index){
        $messages = session('sent_messages', []);

        if(isset($messages[$index])){
            array_splice($messages, $index, 1);

            session(['sent_messages' => $messages]);
        }

        return redirect()->route('message.history');
    }
}
