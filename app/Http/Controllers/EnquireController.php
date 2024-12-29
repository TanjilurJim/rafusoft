<?php

namespace App\Http\Controllers;

use App\Models\Dir;
use App\Models\Enquire;
use Illuminate\Http\Request;

class EnquireController extends Controller
{
    public function store_enquire($slug, Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "message" => "required|max:450",
        ]);

        $dir = Dir::where('slug', $slug)->first();

        $enquire = new Enquire();
        $enquire->name = $request->input('name');
        $enquire->email = $request->input('email');
        $enquire->message = $request->input('message');
        $enquire->source = $slug;
        $enquire->authar = $dir->email;
        $enquire->save();

        return redirect()->back()->with('success', "Message sent Successfull");
    }


    public function delete_enquire($id){
        $enquire = Enquire::find($id)->delete();
        return redirect()->back()->with('success', 'Delete Sucessfull');
    }
    public function view($id){
        $enquire = Enquire::find($id);
        $enquire->status = 1;
        $enquire->save();

        
        return view('dashboard.dir.enquire_view', compact('enquire'));
    }


}
