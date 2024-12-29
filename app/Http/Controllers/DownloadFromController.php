<?php

namespace App\Http\Controllers;

use App\Models\DownloadFrom;
use Illuminate\Http\Request;

class DownloadFromController extends Controller
{
    public function add(Request $request){
        return view("dashboard.downloadfrom.add");
    }
    public function index(){
        $downloadFrom = DownloadFrom::all();
        return view("ui.downloadfrom.index" ,compact("downloadFrom"));
    }
    public function list(Request $request){ 
        $download = DownloadFrom::all();
        return view("dashboard.downloadfrom.list" , ['download'=> $download ]);
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);


        $from = new DownloadFrom();
        $from->title = $request->title;
        $from->url = $request->url;
        $from->description = $request->description;
        $from->save();
        return redirect()->back()->with('success', 'Data Saved Successfully');
    }
    public function edit_store($id, Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);
        
        $from =DownloadFrom::find($id);
        $from->title = $request->title;
        $from->url = $request->url;
        $from->description = $request->description;
        $from->save();
        return redirect()->back()->with('success', 'Data Saved Successfully');
    }


    public function edit($id){
        $from = DownloadFrom::find($id);
        return view('dashboard.downloadfrom.edit', ['from'=> $from ]);
    }


    public function download_ddelete($id){
        DownloadFrom::find($id)->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
