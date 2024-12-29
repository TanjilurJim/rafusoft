<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $headline ="Rafusoft - Software Company Bangladesh";
        return view("ui.static_page.home" ,compact("headline"));
    }


    public function contact(){
        $headline = "Contact Us | Rafusoft";
        return view("ui.static_page.contact" ,compact("headline"));
    }

    public function services(){
        $headline = "Rafusoft provides all IT Services";
        return view("ui.static_page.services" ,compact("headline"));
    }
    public function services2(){
        $headline = "Rafusoft provides all IT Services";
        return view("ui.static_page.services2" ,compact("headline"));
    }


    public function about(){
        $headline = "About Us | Rafusoft";
        return view("ui.static_page.about" ,compact("headline"));
    }


    public function our_team(){
        $headline = "Our Team - Rafusoft";
        $category = TeamCategory::all()->sortBy('category_order');
        return view("ui.static_page.team" ,compact("category", "headline"));
    }


    public function career(){
        $headline = "Career at Rafusoft";
        return view("ui.static_page.career" ,compact("headline"));
    }


    public function gallery(){
        $headline = "Gallery | Best Software Firm in Bangladesh | Rafusoft";
        $gallery = Gallery::where('status', 'Active')->get();
        return view("ui.static_page.gallery", compact("gallery", "headline"));
    }


    public function industrial_attachment(){
        $headline = "Industrial Attachment Training | Rafusoft";
        return view("ui.static_page.industrial_attachment" ,compact("headline"));
    }


    public function software_outsourcing_company_mobile_apps_games(){
        $headline = "Develop iOS, Android &amp; Web App";
        return view("ui.static_page.software_outsourcing_company_mobile_apps_games" ,compact("headline"));
    }


    public function rafusoft_software_development_company(){
        $headline = "Code Software in C#, Python, Qt";
        return view("ui.static_page.rafusoft_software_development_company" ,compact("headline"));
    }


    public function web_development_service_lead_outsourcing(){
        $headline = "Build website with latest technoloy";
        return view("ui.static_page.web_development_service_lead_outsourcing", compact('headline') );
    }


    public function graphic_design(){
        $headline = "An eye-catching graphic design service";
        return view("ui.static_page.graphic_design" ,compact("headline"));
    }


    public function offshore_development_center_services(){
        return view("ui.static_page.offshore_development_center_services");
    }


    public function companies(){
        $headline = 'Company list | Rafusoft';
        return view("ui.static_page.companies" ,compact("headline"));
    }



    public function resources(){
        $headline = "Resources | Rafusoft";
        return view("ui.static_page.resources" ,compact("headline"));
    }


    public function others(){
        $headline = "Other Services | Rafusoft";
        return view("ui.static_page.others" , compact("headline"));
    }



    public function it_solution_dinajpur(){
        $headline = "IT Solution Dinajpur ITSD";
        return view("ui.static_page.it_solution_dinajpur" ,compact("headline"));
    }
    public function javascript_jquery_training_in_dinajpur(){
        $headline = "Java Training | Rafusoft";
        return view("ui.static_page.javascript_jquery_training_in_dinajpur" ,compact("headline"));
    }



    public function php_training_in_dinajpur(){
        $headline = "PHP Training | Rafusoft";
        return view("ui.static_page.php_training_in_dinajpur" ,compact("headline"));
    }



    public function web_designing_training_in_dinajpur(){
        $headline = "Web Design | Rafusoft";

        return view("ui.static_page.web_designing_training_in_dinajpur" ,compact('headline'));
    }
    public function android_training_in_dinajpur(){
        $headline = "Android Training | Rafusoft";
        return view("ui.static_page.android_training_in_dinajpur" , compact("headline"));
    }



    public function java_training_in_dinajpur(){
        $headline = "Java Training | Rafusoft";
        return view("ui.static_page.java_training_in_dinajpur" ,compact('headline'));
    }
    public function microsoft_dot_net_training_in_dinajpur(){
        $headline = "Microsoft-dot-net Training | Rafusoft";
        return view("ui.static_page.microsoft_dot_net_training_in_dinajpur" ,compact('headline'));
    }
    public function digital_marketing_training_in_dinajpur(){
        $headline = 'Digital Marketing Training | Rafusoft';
        return view("ui.static_page.digital_marketing_training_in_dinajpur" ,compact('headline'));
    }
    public function cobra_internet_alert(){
        $headline = 'Cobra Internet Alert 2010 | 100% Free Internet Security Download';
        return view("ui.static_page.cobra_internet_alert" ,compact('headline'));
    }
    public function webtv(){
        $headline = 'Rafu TV - Rafusoft Web TV';
        return view("ui.static_page.webtv" , compact("headline"));
    }




    public function top_software_company(){
        $headline = "Top Most Software Company in Bangladesh";
        return view("ui.static_page.top_software_company" ,compact("headline"));
    }
    public function training(){
        $headline = "Rafusoft IT training In Dinajpur";
        return view("ui.static_page.training");
    }
    public function cobra_antivirus(){
        $headline = "Cobra Antivirus Anti Malware Tools | Rafusoft";
        return view("ui.static_page.cobra_antivirus", compact("headline"));
    }



    public function cobra_antivirus_sdk(){
        $headline = "Cobra Antivirus SDK - Robust Anti Malware Tools | Rafusoft";
        return view("ui.static_page.cobra_antivirus_sdk" , compact("headline"));
    }
    public function invoice(){
        return view("ui.static_page.invoice");
    }




    
    
    //added by Touhid
    
    public function rafuHost(Request $request)
    {



        // dd('RafuHost');

        return view("ui.static_page.host.index");
    }

    public function domainCheck(Request $request)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://host.rafusoft.com/includes/api.php');
        curl_setopt($curl, CURLOPT_POST, true);
        $postData = [
            'action' => 'DomainWhois',
            'username' => 'hRJQ6CCaBZr9vyT81wgQtEGfcxP6nqUC',
            'password' => 'jo02a5xme0HWIBJoEzLX0P2WQ4NQVN3N',
            'domain' => $request->domain,
            'responsetype' => 'json',
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($curl);

        // Check for errors
        if ($response === false) {
            $errorMessage = curl_error($curl);

            // dd($errorMessage);
            return response()->json(['error' => $errorMessage], 401);
        } else {
            // Process the response
            // Assuming the response is in JSON format
            $responseData = json_decode($response, true);
            // Do something with $responseData
            // dd($responseData);
            return response()->json($responseData);
        }
    }


}
