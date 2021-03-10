<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function get(){
        $contacts = User::where('id','!=',auth()->id())->get();
        return response()->json($contacts);
    }

    public function getMessages($id){
        $messages = Message::where('from',$id)->orWhere('to',$id)->get();


        return response()->json($messages);
    }

    public function saveMessage(Request $request){
        $message = Message::create([
           'from'=>current_user()->id,
            'to'=>$request->contact_id,
            'text'=>$request->message
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);


    }


}
