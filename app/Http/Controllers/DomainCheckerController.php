<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Larva\Whois\Whois;
use Illuminate\Support\Facades\Validator;


class DomainCheckerController extends Controller
{
    public function index(){
        return view("ui.tools.index");
    }


    // public function check(Request $request)
    // {
    //     $domain = $request->input('domain');
    //     $result = Whois::lookup($domain);
    //     return response()->json($result);
    // }


    public function check(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'domain' => 'required|url|active_url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                "error" => "Website is Unavailable at this Moment.",
                "status" => "0 Unavailable"
            ]);
        }
       
        $domain = $request->input('domain');
     //   $result = Whois::lookup($domain);

    // $status = "Ok";
    // $owner = $result["owner"];
    // $expiration_date = $result["expiration_date"];
    // $creation_date = $result["creation_date"];
    // $update_date = $result["updated_date"];


        // return back()->with("status", $status);
        return redirect()->back()->with([
            "message" => "That Website is Up and Running!",
            "status" => "200 Ok"
        ]);

    }
    

}
