<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function read()
    {
        $allMessages = Message::all();

        return view('messages', ['messages' => $allMessages]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $message = new Message;
        $message->name = $request->get('name');
        $message->email = $request->get('email');
        $message->message = $request->get('message');

        $message->save();

        return redirect('/home');

    }
}
