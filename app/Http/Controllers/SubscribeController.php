<?php

namespace App\Http\Controllers;

use App\Models\GeneralMessage;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index(){
        return view("dashboard.subscribe.index");
    }


    public function subscribe(Request $request){
        $user = User::where('email' , auth()->user()->email)->first();
        $subscribe = $request->input('subscribe');
        $user->$subscribe = "on";
        $user->save();


        $message = new GeneralMessage();
        $message->name =  auth()->user()->name;
        $message->email =  auth()->user()->email;
        $ipAddress = $request->ip();
        $message->message =  "User subscribed $subscribe. User Name: " . auth()->user()->name .", Email: " . auth()->user()->email . "  IP Address:  $ipAddress";
        $message->save();
        return redirect()->back()->with('success', "Subscripition Successfull");
    }
}
