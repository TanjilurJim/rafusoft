<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
      $users = User::orderBy('active_at', 'desc')->paginate(20);
        return view('dashboard.user.index', compact('users'));
    }


    public function update(Request $request, $id)
{
   $invoice = $request->input('invoice');
   $product = $request->input('product');
   $ref = $request->input('ref');
   $dir = $request->input('dir');
   $file = $request->input('file');
   $contact = $request->input('contact');
   $career = $request->input('career');
   $quote = $request->input('quote');
   $user = User::findOrFail($id);
   
   if($invoice == 1){
        $user->invoice = "on";
   }else{
    $user->invoice = "off";
   }
   if($product == 1){
        $user->product = "on";
   }else{
    $user->product = "off";
   }
   if($ref == 1){
        $user->ref = "on";
   }else{
    $user->ref = "off";
   }
   if($dir == 1){
        $user->dir = "on";
   }else{
    $user->dir = "off";
   }

   if($file == 1){
        $user->file = "on";
   }else{
    $user->file = "off";
   }

   if($contact == 1){
        $user->contact = "on";
   }else{
    $user->contact = "off";
   }
   if($career == 1){
        $user->career = "on";
   }else{
    $user->career = "off";
   }
   if($quote == 1){
        $user->quote = "on";
   }else{
    $user->quote = "off";
   }

   $user->dir_limit = $request->input('dir_limit');
   $user->dir_file_limit = $request->input('dir_file_limit');


   $user->save();

    return redirect()->back()->with('success', 'User updated successfully.');
}



    public function delete($id){
        User::find($id)->delete();
        return redirect()->back()->with('success' ,  'Delete Successfull');
    }
}
