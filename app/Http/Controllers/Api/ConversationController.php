<?php

namespace App\Http\Controllers\Api;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\MessageEvent;

class ConversationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->get('receiver_id'),
            'body' => $request->get('body'),
        ]);

        $event = new MessageEvent($message);

        event($event);

        return $message;
    }
}
