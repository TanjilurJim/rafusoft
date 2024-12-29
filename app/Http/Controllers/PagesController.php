<?php

namespace App\Http\Controllers;

use App\Models\Privacy;
use App\Models\Refund;
use App\Models\Terms;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function privacy(){
        $privacy = Privacy::find(1);
        return view("dashboard.pages.privacy" ,compact("privacy"));
    }
    public function refund(){
        $refund = Refund::find(1);
        return view("dashboard.pages.refund" ,compact("refund"));
    }



    public function view_privacy(){
        $privacy = Privacy::find(1);
        return view("ui.pages.privacy" ,compact("privacy"));
    }
    public function view_terms(){
        $terms = Terms::find(1);
        return view("ui.pages.terms" ,compact("terms"));
    }
    public function view_refund(){
        $refund = Refund::find(1);
        return view("ui.pages.refund" ,compact("refund"));
    }




    public function privacy_store(Request $request){
        $validatedData = $request->validate([
            "headingone"=> "required",
            "headingtwo"=> "required",
            "content"=> "required",
        ]) ;

        $privacy = Privacy::find(1);
        $privacy->headingone = $request->input("headingone");
        $privacy->headingtwo = $request->input("headingtwo");
        $privacy->content = $request->input("content");
        $privacy->save();
        return redirect()->back()->with("success","Page Updated");
    }


    public function refund_store(Request $request){
        $validatedData = $request->validate([
            "headingone"=> "required",
            "headingtwo"=> "required",
            "content"=> "required",
        ]) ;

        $privacy = Refund::find(1);
        $privacy->headingone = $request->input("headingone");
        $privacy->headingtwo = $request->input("headingtwo");
        $privacy->content = $request->input("content");
        $privacy->save();
        return redirect()->back()->with("success","Page Updated");
    }


    public function terms_store(Request $request){
        $validatedData = $request->validate([
            "headingone"=> "required",
            "headingtwo"=> "required",
            "content"=> "required",
        ]) ;

        $privacy = Terms::find(1);
        $privacy->headingone = $request->input("headingone");
        $privacy->headingtwo = $request->input("headingtwo");
        $privacy->content = $request->input("content");
        $privacy->save();
        return redirect()->back()->with("success","Page Updated");
    }





    public function terms (){
        $terms = Terms::find(1);
        return view("dashboard.pages.terms" ,compact("terms"));
    }
}
