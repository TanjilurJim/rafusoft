<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquire;
use App\Models\ProductFAQ;
use App\Models\ProductPrivacy;
use App\Models\ProductRefund;
use App\Models\ProductReview;
use App\Models\Products;
use App\Models\ProductSetting;
use App\Models\ProductTerms;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug){
        $product = Products::where('slug', $slug)->first();
        $review = ProductReview::where('product_id', $product->id)->get();
        $faq = ProductFAQ::where('product_id', $product->id)->get();
        $setting = ProductSetting::where('email', auth()->user()->email)->first();
        return view("ui.product.index" , ['product' => $product, 'review'=> $review , 'faq' => $faq, 'setting' => $setting]);
    }



    public function setting(){
        $setting = ProductSetting::where('email', auth()->user()->email)->first();
        return view('dashboard.product.setting', compact('setting'));
    }
    public function setting_store(Request $request){
       $request->validate([
        "name"=>"required",
        "address"=>"required",
        "full_address"=>"required",
        "phone"=>"required",
        "email"=>"required",
       ]);


       $setting = ProductSetting::where('email', auth()->user()->email)->first();

       if($setting){
            $setting->name = $request->input('name');
            $setting->address = $request->input('address');
            $setting->full_address = $request->input('full_address');
            $setting->phone = $request->input('phone');
            $setting->s_email = $request->input('email');
            $setting->facebook = $request->input('facebook');
            $setting->map = $request->input('map');
            $setting->save();
       }else{
        $setting = new ProductSetting();
        $setting->name = $request->input('name');
        $setting->address = $request->input('address');
        $setting->full_address = $request->input('full_address');
        $setting->phone = $request->input('phone');
        $setting->s_email = $request->input('email');
        $setting->email = auth()->user()->email;
        $setting->facebook = $request->input('facebook');
        $setting->map = $request->input('map');
        $setting->save();
       }

       return redirect()->back()->with('success', "Setting Updated");
    }


    public function privacy_view (){
        $privacy = ProductPrivacy::where('email', auth()->user()->email)->first();
        return view('dashboard.product.privacy', compact('privacy'));
    }
    public function terms_view  (){
         $terms = ProductTerms::where('email', auth()->user()->email)->first();
        return view('dashboard.product.terms', compact('terms'));
    }
    public function refund_view  (){
        $refund = ProductRefund::where('email', auth()->user()->email)->first();
        return view('dashboard.product.refund', compact('refund'));
    }

    public function privacy(Request $request){
        $request->validate([
            "privacy"=> "required",
        ]);

        $privacy = $request->input('privacy');
        $myprivacypage = ProductPrivacy::where('email', auth()->user()->email)->first();

        if($myprivacypage){
            $myprivacypage->privacy = $privacy;
            $myprivacypage->save();
        }else{
            $privacy_ = new ProductPrivacy();
            $privacy_->privacy = $privacy;
            $privacy_->email = auth()->user()->email;
            $privacy_->save();
        }
        return redirect()->back()->with('success', "Privacy Policy Updated");
    }


    public function terms(Request $request){
        $request->validate([
            "terms"=> "required",
        ]);

        $terms = $request->input('terms');
        $mytermspage = ProductTerms::where('email', auth()->user()->email)->first();

        if($mytermspage){
            $mytermspage->terms = $terms;
            $mytermspage->save();
        }else{
            $terms_ = new ProductTerms();
            $terms_->terms = $terms;
            $terms_->email = auth()->user()->email;
            $terms_->save();
        }
        return redirect()->back()->with('success', "Terms & Condition Updated");
    }
    public function refund(Request $request){
        $request->validate([
            "refund"=> "required",
        ]);

        $refund = $request->input('refund');
        $mytermspage = ProductRefund::where('email', auth()->user()->email)->first();

        if($mytermspage){
            $mytermspage->refund = $refund;
            $mytermspage->save();
        }else{
            $refund_ = new ProductRefund();
            $refund_->refund = $refund;
            $refund_->email = auth()->user()->email;
            $refund_->save();
        }
        return redirect()->back()->with('success', "Refund Policy Updated");
    }



    public function create(){
        return view("dashboard.product.create");
    }



    public function store(Request $request){
        $validate = $request->validate([
            "slug"=>"required",
            "content"=>"required",
            "schema_image"=>"required",
            "title"=>"required",
            "meta_description"=>"required",
            "meta_keywords"=>"required",
            "banner_h_one"=>"required",
            "banner_h_two"=>"required",
            "headline"=>"required",
            "favicon"=>"required",
            "og_image"=>"required",
            "product_title"=>"required",
            "product_description"=>"required",
            "r_price"=>"required",
            "o_price"=>"required",
            "brand"=>"required",
            "product_image"=>"required",
            "features_paragraph"=>"required",
            "features_image"=>"required",
        ]);


        $product = new Products();
        $product->email = auth()->user()->email;
        $product->slug = $request->input('slug');
        $product->title = $request->input('title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->banner_h_one = $request->input('banner_h_one');
        $product->banner_h_two = $request->input('banner_h_two');
        $product->headline = $request->input('headline');
        $product->favicon = $request->input('favicon');
        $product->og_image = $request->input('og_image');
        $product->schema_image = $request->input('schema_image');
        $product->content = $request->input('content');
        $product->product_title = $request->input('product_title');
        $product->product_description = $request->input('product_description');
        $product->r_price = $request->input('r_price');
        $product->o_price = $request->input('o_price');
        $product->brand = $request->input('brand');
        $product->product_image = $request->input('product_image');
        $product->features_paragraph = $request->input('features_paragraph');
        $product->features_image = $request->input('features_image');
        $product->features_list = $request->input('features_list');
        $product->save();
        return redirect()->back()->with('success', "Product Added Successfull");

    }
    public function Update_store($id, Request $request){
        $validate = $request->validate([
            "slug"=>"required",
            "content"=>"required",
            "schema_image"=>"required",
            "title"=>"required",
            "meta_description"=>"required",
            "meta_keywords"=>"required",
            "banner_h_one"=>"required",
            "banner_h_two"=>"required",
            "headline"=>"required",
            "favicon"=>"required",
            "og_image"=>"required",
            "product_title"=>"required",
            "product_description"=>"required",
            "r_price"=>"required",
            "o_price"=>"required",
            "brand"=>"required",
            "product_image"=>"required",
            "features_paragraph"=>"required",
            "features_image"=>"required",
        ]);


        $product = Products::find($id);
        $product->slug = $request->input('slug');
        $product->title = $request->input('title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->banner_h_one = $request->input('banner_h_one');
        $product->banner_h_two = $request->input('banner_h_two');
        $product->headline = $request->input('headline');
        $product->favicon = $request->input('favicon');
        $product->og_image = $request->input('og_image');
        $product->schema_image = $request->input('schema_image');
        $product->content = $request->input('content');
        $product->product_title = $request->input('product_title');
        $product->product_description = $request->input('product_description');
        $product->r_price = $request->input('r_price');
        $product->o_price = $request->input('o_price');
        $product->brand = $request->input('brand');
        $product->product_image = $request->input('product_image');
        $product->features_paragraph = $request->input('features_paragraph');
        $product->features_image = $request->input('features_image');
        $product->features_list = $request->input('features_list');
        $product->save();
        $product->email = auth()->user()->email;
        $product->save();
        return redirect()->back()->with('success', "Product Updated Successfull");

    }

    public function show(){
        $products = Products::where('email', auth()->user()->email)->get();;
        return view('dashboard.product.list', compact('products'));
    }


    public function edit($id){
        $product = Products::find($id);
        return view('dashboard.product.edit', compact('product'));
    }



    public function delete($id){
        $product = Products::find($id)->delete();
        return redirect()->back()->with('success', "Product Delete Successfull");
    }





    public function review($id){
        $product = Products::find($id);
        $review = ProductReview::where('product_id', $id)->get();
        return view('dashboard.product.review', compact('product', 'review'));
    }



    public function review_store($id , Request $request){
        $validate = $request->validate([
            "name"=> "required",
            "date"=> "required",
            "description"=> "required"
        ]);

        $review = new ProductReview();
        $review->product_id = $id;
        $review->name = $request->input('name');
        $review->date = $request->input('date');
        $review->description = $request->input('description');
        $review->save();

        return redirect()->back()->with('success', "Review Added Successfull");
    }
    public function review_edit_store($product_id, $id , Request $request){
        $validate = $request->validate([
            "name"=> "required",
            "date"=> "required",
            "description"=> "required"
        ]);

        $review =  ProductReview::find($id);
        $review->name = $request->input('name');
        $review->date = $request->input('date');
        $review->description = $request->input('description');
        $review->save();

        return redirect("/dashboard/product/review/$product_id")->with('success', "Review Added Successfull");
    }


    public function review_edit($product_id, $id){
        $review = ProductReview::find($id);
        return view('dashboard.product.review_edit', compact('review'));
    }




    public function review_delete($id){
        $review = ProductReview::find($id)->delete();
        return redirect()->back()->with('success', "Review Delete Successfull");
    }



    public function faq($id){
        $product = Products::find($id);
        $faq = ProductFAQ::where('product_id', $id)->get();
        return view('dashboard.product.faq', compact('product','faq'));
    }
    public function faq_store($id, Request $request){
        $validate = $request->validate([
            "question"=>"required",
            "ans"=>"required",
        ]);
    
        $faq = new ProductFAQ();
        $faq->product_id = $id;
        $faq->question = $request->input('question');
        $faq->ans = $request->input('ans');
        $faq->save();

        return redirect()->back()->with('success', "Faq Added Successfull");
    }




    public function faq_edit($product_id, $id){
        $faq = ProductFAQ::find($id); 
        return view("dashboard.product.faq_edit", compact('faq'));
    }


    public function faq_update_store($product_id, $id, Request $request){
        $validate = $request->validate([
            "question"=>"required",
            "ans"=>"required",
        ]);

        $faq = ProductFAQ::find($id);
        $faq->question = $request->input('question');
        $faq->ans = $request->input('ans');
        $faq->save();
        return redirect("/dashboard/product/faq/$product_id")->with('success', "Faq Added Successfull");
    }


    public function faq_delete($id){
        $faq = ProductFAQ::find($id)->delete();

        return redirect()->back()->with('success', "Faq Delete Successfull");
    }



    public function privacy_view_client($id){
        $product = Products::find($id);
        $privacy = ProductPrivacy::where('email', $product->email)->first();
        return view('ui.product.privacy', compact('privacy'));
    }
    public function terms_view_client($id){
        $product = Products::find($id);
        $terms = ProductTerms::where('email', $product->email)->first();
        return view('ui.product.terms', compact('terms'));
    }
    public function refund_view_client($id){
        $product = Products::find($id);
        $refund = ProductRefund::where('email', $product->email)->first();
        return view('ui.product.refund', compact('refund'));
    }
    public function enquire($slug, $id, Request $request){

        $request->validate([
            'name'=>"required",
            'email'=>"required",
            'phone'=>"required",
        ]);

        $product = Products::find($id);
        $enquire = new ProductEnquire();
        $enquire->name = $request->input('name');
        $enquire->email = $request->input('email');
        $enquire->phone = $request->input('phone');
        $enquire->slug = $slug;
        $enquire->product_id = $id;
        $enquire->product_owner = $product->email;
        $enquire->save();
        return redirect()->back()->with('success', 'Enquery Send succesfull');
    }


    public function enquirelist(){
        $enquires = ProductEnquire::where('product_owner', auth()->user()->email)->paginate(20);
        return view("dashboard.product.enquire", compact('enquires'));
    }
    public function enquirelist_delete ($id){
         ProductEnquire::find($id)->delete();
        return redirect()->back()->with('success', 'Enquery Delete succesfull');
    }

}
