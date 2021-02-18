<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function get(){
        $contacts = User::All();
        return response()->json($contacts);
    }
}
