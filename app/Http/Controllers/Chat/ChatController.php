<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Message;
use Input;
use Request;
use Vinkla\Pusher\Facades\Pusher;

class ChatController extends Controller
{
    public function getLogin()
    {
        return view("login");
    }

    public function getChat()
    {
        return view("chat");
    }

    public function saveMessage()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $message = new Message;
            $message->author = $data["author"];
            $message->message = $data["message"];
            $message->save();

            Pusher::trigger('chat', 'message', ['message' => $message]);
        }

    }

    public function listMessages(Message $message) {
        return response()->json($message->orderBy("created_at", "DESC")->take(5)->get());
    }
}
