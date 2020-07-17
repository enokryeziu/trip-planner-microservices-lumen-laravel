<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class ContactMessageController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>  'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $message = new Message([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
        
        $message->save();
        
        return redirect('/contact');
    }
}
