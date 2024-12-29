<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index(){
        $messages = Career::orderBy('created_at', 'desc')->paginate(20);
        $unread = Career::where('status', 'unread')->count();
        $read = Career::where('status', 'read')->count();
        return view("dashboard.inbox.career" ,['messages' => $messages , "unread"=> $unread , "read"=> $read]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'subject' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:10240',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);


        $icon = $request->file('cv');
        $iconName = $icon->getClientOriginalName();
        $destinationPath = public_path('cv');

        $icon->move($destinationPath, $iconName);
        $cvPath  =  "cv/". $iconName;

        $code = $request->input('code');

        // Create and save the form data
        $formData = new Career;
        $formData->name = $request->name;
        $formData->email = $request->email;
        $formData->mobile =$code.$request->mobile;
        $formData->subject = $request->subject;
        $formData->cv = $cvPath;
        $formData->message = $request->message;
        $formData->status = "unread";
        $formData->save();
        return redirect()->back()->with('success','Apllyed Successfull');
    }



    public function view($id){
        $message = Career::find($id);
        return view('dashboard.inbox.careerview',['message'=> $message ]);
    }


    public function update(Request $request, $id){
        $message = Career::find($id);
        
        if($message->status == "read"){
            $message->status = "unread";
            $message->save();
        }else{
            $message->status = "read";
            $message->save();
        }

        return redirect('/dasboard/inbox/career')->with("success","Updated Successfull");
    }

    public function delete($id){
        $message = Career::find($id);
        $message->delete();
        return redirect('/dasboard/inbox/career')->with("success","Delete Successfull");
    }


    public function great_update($id, $great){
        $message = Career::find($id);
        $message->great = $great;
        $message->save();
        return redirect()->back()->with("success","Great Update Successfull");
    }



    public function quote(){ 
        return view("ui.static_page.quote");
    }


    public function quote_store(Request $request){
        $validate = $request->validate([
            "name"=> "required",
            "email"=> "required",
            "phone"=> "required",
            "whatsapp"=> "required",
            "type"=> "required",
            "address"=> "required",
            "about"=> "required",
            "brief"=> "required",
            "budget"=> "required",
            "timeline"=> "required",
            "device"=> "required",
            "describe"=> "required",
        ]);

        $quote = new Quote;
        $quote->name = $request->input("name");
        $quote->email = $request->input("email");
        $quote->phone = $request->input("phone");
        $quote->type = $request->input("type");
        $quote->address = $request->input("address");
        $quote->brief = $request->input("brief");
        $quote->about = $request->input("about");
        $quote->budget = $request->input("budget");
        $quote->timeline = $request->input("timeline");
        $quote->device = $request->input("device");
        $quote->describe = $request->input("describe");
        $quote->whatsapp = $request->input("whatsapp");
        $quote->currency = $request->input("currency");
        $quote->save();
        return redirect()->back()->with("success","Requested for Quote");
    }




    public function quote_admin(){
        $quote = Quote::paginate(20);
        $unread = Quote::where('status', 'unread')->count();
        $read = Quote::where('status', 'read')->count();
        return view("dashboard.quote.index" , compact("quote", "unread", "read"));
    }


    public function delete_quote($id){
        $quote = Quote::find($id);
        $quote->delete();
        return redirect('/dasboard/inbox/quote')->with("success","Deleted Successfull");
    }

    public function status_quote($id){
        $quote = Quote::find($id);

        if($quote->status == "read"){
            $quote->status = "unread";
            $quote->save();
        }else{
            $quote->status = "read";
            $quote->save();
        }

       
        return redirect('/dasboard/inbox/quote')->with("success","Updated Status ");
    }
    public function quote_view($id){
        $quote = Quote::find($id);

       return view("dashboard.quote.view" , compact("quote"));
    }

    public function great_update_quote($id, $great){
        $message = Quote::find($id);
        $message->great = $great;
        $message->save();
        return redirect()->back()->with("success","Great Update Successfull");
    }


    public function delete_groupby_career (Request $request){
        $great = $request->input('great');

        if (auth()->user()->role == "superadmin") {
            $message = Career::where('great', $great)->delete();
            return redirect()->back()->with('success', 'Delete Successfull');
        }else{
            return redirect('/dashboard/page-not-found');
        }
    }
    public function delete_groupby_quote (Request $request){
        $great = $request->input('great');

        if (auth()->user()->role == "superadmin") {
            $message = Quote::where('great', $great)->delete();
            return redirect()->back()->with('success', 'Delete Successfull');
        }else{
            return redirect('/dashboard/page-not-found');
        }
    }
}
 