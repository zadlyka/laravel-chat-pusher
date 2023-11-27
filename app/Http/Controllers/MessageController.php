<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MessageEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $users =  User::where('id', '!=', Auth::user()->id)->get();
        return view('chat.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('chat.show', ['user' => $user]);
    }

    public function fetch()
    {
        return Message::get();
    }

    public function send(Request $request)
    {
        $Message = Message::create([
            'sender_id' => Auth::user()->id,
            'message' => $request->input('message'),
            'receiver_id' => $request->input('receiver_id')
        ]);

        event(new MessageEvent($Message));

        return $Message;
    }
}
