<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
class ContactController extends Controller
{
    public function store(Request $request){
        $request->validate  = ([
            'name' => 'required|string',
            'email' =>  'required|string|unique:email,email',
            'subject' => 'required|string',
            'message' => 'requied|string|max:1255'
        ]);

        $contact = Contact::create([    
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->website,
            'message' => $request->message
        ]);
        return redirect()->back()->with('success', 'Yuborgan ma\'lumotingiz qabul qilindi');
    }
}
