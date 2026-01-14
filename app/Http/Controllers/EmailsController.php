<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255|unique:email,email'
        ]);
        
        $email = Email::create([
            'email' => $request->email
        ]);
     return back()->with('esuccess', 'Obuna bo\'ldingiz raxmat!');
    }
}
