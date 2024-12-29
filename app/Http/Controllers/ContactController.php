<?php

namespace App\Http\Controllers;

use App\Models\GeneralMessage;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){


        $unread = Message::where('status', 'unread')->count();
        $read = Message::where('status', 'read')->count();
        $messages = Message::orderBy('created_at', 'desc')->paginate(20);
        return view("dashboard.inbox.index" , ["messages"=> $messages, "unread"=> $unread, "read"=> $read]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

        $message = new Message();
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->status = "unread";
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }


    public function view($id){
        $message = Message::find($id);
        return view('dashboard.inbox.view', ['message'=> $message]);
    }


    public function update(Request $request, $id){
        $message = Message::find($id);
      
        if($message->status == "read"){
            $message->status = "unread";
            $message->save();
        }else{
            $message->status = "read";
            $message->save();
        }

        
        return redirect('/dasboard/inbox/contact')->with("success","Updated Successfull");
    }

    public function delete($id){
        $message = Message::find($id);
        $message->delete();
        return redirect('/dasboard/inbox/contact/')->with("success","Delete Successfull");
    }
    public function great_update($id, $great){
        $message = Message::find($id);
        $message->great = $great;
        $message->save();
        return redirect()->back()->with("success","Great Update Successfull");
    }



    public function delete_groupby (Request $request){
        $great = $request->input('great');

        if (auth()->user()->role == "superadmin") {
            Message::where('great', $great)->delete();
            return redirect()->back()->with('success', 'Delete Successfull');
        }else{
            return redirect('/dashboard/page-not-found');
        }
    }




    public function general(){
        $message = GeneralMessage::all();
        $messages = GeneralMessage::paginate(25);
        $unread = GeneralMessage::where('status', "Unread")->get();
        $unread = count($unread);
        $read = count($message)-$unread;
        return view("dashboard.inbox.general", compact('message', 'messages', 'read', 'unread'));
    }



    public function generalview($id){
        $message = GeneralMessage::find($id);
        return view('dashboard.inbox.generalview', compact('message'));
    }





    public function generalupdate(Request $request, $id){
        $message = GeneralMessage::find($id);
      
        if($message->status == "read"){
            $message->status = "unread";
            $message->save();
        }else{
            $message->status = "read";
            $message->save();
        }

        
        return redirect('/dasboard/inbox/general')->with("success","Updated Successfull");
    }

    public function generaldelete($id){
        $message = GeneralMessage::find($id);
        $message->delete();
        return redirect('/dasboard/inbox/general')->with("success","Delete Successfull");
    }
    public function generalgreat_update($id, $great){
        $message = GeneralMessage::find($id);
        $message->great = $great;
        $message->save();
        return redirect()->back()->with("success","Great Update Successfull");
    }



    public function generaldelete_groupby (Request $request){
        $great = $request->input('great');

        if (auth()->user()->role == "superadmin") {
            GeneralMessage::where('great', $great)->delete();
            return redirect()->back()->with('success', 'Delete Successfull');
        }else{
            return redirect('/dashboard/page-not-found');
        }
    }


}
