<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Ref;
use App\Models\Refnotice;
use App\Models\Sitemap;
use Illuminate\Http\Request;

class RefpageController extends Controller
{
    public function create()
    {
        $category = Category::where('email', auth()->user()->email)->get();
        return view("dashboard.ref.create", ["category" => $category]);
    }
    public function category()
    {
        $category = Category::where('email', auth()->user()->email)->get();
        return view("dashboard.ref.category", ["category" => $category]);
    }
    public function category_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->email = auth()->user()->email;
        $category->name = $request->input("name");
        $category->save();
        return redirect()->back()->with('success', 'Data Saved Successfully');
    }
    public function category_edit($id)
    {
        $cat = Category::find($id);
        $category = Category::all();
        return view('dashboard.ref.catgory_edit', ['category' => $category, 'cat' => $cat]);
    }
    public function category_ddelete($id)
    {
        Category::find($id)->delete();
        return redirect('/dashboard/ref/category')->with('success', 'Data Delete Successfully');
    }


    public function category_edit_store($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        $cat = Category::find($id);
        $cat->name = $request->input('name');
        $cat->save();
        return redirect('/dashboard/ref/category')->with('success', 'Data Updated Successfully');
    }



    public function create_store(Request $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required|unique:refs',
            'title' => 'required',
            'content' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'banner_head' => 'required',
            'banner_head_two' => 'required',
            'page_url' => 'required',
            'favicon' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);


        $ref = new Ref();
        $ref->email = auth()->user()->email;
        $ref->slug = $request->input('slug');
        $ref->title = $request->input('title');
        $ref->content = $request->input('content');
        $ref->meta_keyword = $request->input('meta_keyword');
        $ref->meta_description = $request->input('meta_description');
        $ref->banner_head = $request->input('banner_head');
        $ref->banner_head_two = $request->input('banner_head_two');
        $ref->canonical = $request->input('canonical');
        $ref->page_url = $request->input('page_url');
        $ref->favicon = $request->input('favicon');
        $ref->og = $request->input('og');
        $ref->schema_company_name = $request->input('schema_company_name');
        $ref->schema_description = $request->input('schema_description');
        $ref->streetAddress = $request->input('streetAddress');
        $ref->addressLocality = $request->input('addressLocality');
        $ref->addressRegion = $request->input('addressRegion');
        $ref->postalCode = $request->input('postalCode');
        $ref->addressCountry = $request->input('addressCountry');
        $ref->telephone = $request->input('telephone');
        $ref->schema_url = $request->input('schema_url');
        $ref->industry_type = $request->input('industry_type');
        $ref->price_range = $request->input('price_range');
        $ref->openingHours = $request->input('openingHours');
        $ref->artical_headline = $request->input('artical_headline');
        $ref->artical_description = $request->input('artical_description');
        $ref->author_type = $request->input('author_type');
        $ref->author_name = $request->input('author_name');
        $ref->author_url = $request->input('author_url');
        $ref->publisher = $request->input('publisher');
        $ref->published_date = $request->input('published_date');
        $ref->modified_date = $request->input('modified_date');
        $ref->publisher_logo = $request->input('publisher_logo');
        $ref->schema_image_url = $request->input('schema_image_url');
        $ref->maps = $request->input('map');
        $ref->status = $request->input('status');
        $ref->category = $request->input('category');
        $ref->save();
        return redirect('/dashboard/ref/list')->with('success', 'Create Successfully');
    }


    public function ref_list()
    {
        $ref = Ref::all();
        $myref = Ref::where('email', auth()->user()->email)->get();

        if (auth()->user()->role == 'superadmin') {
            return view('dashboard.ref.list', compact('ref'));
        }else{
            return view('dashboard.ref.list', ['ref' => $myref]);
        }

        
    }

    public function update($id , Request $request)
    {
        $ref = Ref::find($id);

        $status = $request->input('status');
        $contact = $request->input('contact');

        if ($status) {
            $ref->status = "Published";
            $ref->save();

            $slug = $ref->slug;
            $sitemap = new Sitemap();
            $sitemap->slug = "https://rafusoft.com/ref/" . $slug;
            $sitemap->save();
        } else {
            $ref->status = "Unpublished";
            $ref->save();

            $slug = "https://rafusoft.com/ref/" . $ref->slug;
            $sitemap = Sitemap::where("slug", "=", $slug)->delete();
        }


        if($contact){
            $ref->contact = 1;
            $ref->save();
        }else{
            $ref->contact = 0;
            $ref->save();
        }

        return redirect()->back()->with('success', 'Status Updated Successfully');
    }


    public function edit($id)
    {
        $ref = ref::find($id);
        $category = Category::all();
        return view('dashboard.ref.edit', ['dir' => $ref, 'category' => $category]);
    }

    public function edit_store($id, Request $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'banner_head' => 'required',
            'banner_head_two' => 'required',
            'favicon' => 'required',
            'og' => 'required',
            'status' => 'required',
        ]);


        $dir = Ref::find($id);
        $dir->slug = $request->input('slug');
        $dir->title = $request->input('title');
        $dir->content = $request->input('content');
        $dir->meta_keyword = $request->input('meta_keyword');
        $dir->meta_description = $request->input('meta_description');
        $dir->banner_head = $request->input('banner_head');
        $dir->banner_head_two = $request->input('banner_head_two');
        $dir->canonical = $request->input('canonical');
        $dir->page_url = $request->input('page_url');
        $dir->favicon = $request->input('favicon');
        $dir->og = $request->input('og');
        $dir->schema_company_name = $request->input('schema_company_name');
        $dir->schema_description = $request->input('schema_description');
        $dir->streetAddress = $request->input('streetAddress');
        $dir->addressLocality = $request->input('addressLocality');
        $dir->addressRegion = $request->input('addressRegion');
        $dir->postalCode = $request->input('postalCode');
        $dir->addressCountry = $request->input('addressCountry');
        $dir->telephone = $request->input('telephone');
        $dir->schema_url = $request->input('schema_url');
        $dir->industry_type = $request->input('industry_type');
        $dir->price_range = $request->input('price_range');
        $dir->openingHours = $request->input('openingHours');
        $dir->artical_headline = $request->input('artical_headline');
        $dir->artical_description = $request->input('artical_description');
        $dir->author_type = $request->input('author_type');
        $dir->author_name = $request->input('author_name');
        $dir->author_url = $request->input('author_url');
        $dir->publisher = $request->input('publisher');
        $dir->published_date = $request->input('published_date');
        $dir->modified_date = $request->input('modified_date');
        $dir->publisher_logo = $request->input('publisher_logo');
        $dir->schema_image_url = $request->input('schema_image_url');
        $dir->maps = $request->input('map');
        $dir->status = $request->input('status');
        $dir->save();
        return redirect('/dashboard/ref/list')->with('success', 'Updated Successfully');
    }






    public function preview($slug)
    {
        $ref = Ref::where('slug', $slug)->first();

        if(!$ref){
            return view('error.404');
        }

        return view('dashboard.preview.ref.index', compact('ref'));
    }
    public function view($slug)
    {
        $ref = Ref::where('slug', $slug)->first();
        
        if(!$ref){
            return view('error.404');
        }
        
        $notice = Refnotice::where('ref_id', $ref->id)->first();


        

        if ($ref->status == 'Published') {
            $faq = Faq::where('ref_id','=', $ref->id)->get();
            return view('ref.index', compact('ref', 'faq', 'notice'));
        } else {
            return view('error.404');
        }
    }



    public function delete_ref($id)
    {
        $ref = Ref::where('id', $id)->firstOrFail();
        $ref->delete();
        return redirect()->back()->with('success', 'Delete Successfull');
    }










// ----------------------------------------------------

public function faq($id){
    $ref = Ref::where('id', $id)->first();
    $faq = Faq::where('ref_id', $id)->get();
    return view('dashboard.ref.faq', compact('ref', 'faq'));
}




public function toggle_status($id){
    $ref = Ref::find($id);
    if($ref->faq == "off"){
        $ref->faq = "on";
        $ref->save();
    }else{
        $ref->faq = "off";
        $ref->save();
    }
    return redirect()->back()->with("success","Status Updated Succesfull");
}



public function faq_store ($id , Request $request){
    $validate = $request->validate([
        "question"=> "required",
        "ans"=> "required",
    ]);

    $faq = new Faq();
    $faq->question = $request->input("question");
    $faq->ans = $request->input("ans");
    $faq->ref_id = $id;
    $faq->save();
    return redirect()->back()->with("success","New Faq Added Successfull");
}


public function faq_delete($id){
    Faq::find($id)->delete();
    return redirect()->back()->with("success","Delete Successfull");
}


public function faq_update($id){
    $faq = Faq::find($id);
    return view("dashboard.dir.faq_edit", compact("faq"));
}



public function faq_update_store ($id , $ref_id, Request $request){
    $validate = $request->validate([
        "question"=> "required",
        "ans"=> "required",
    ]);

    $faq = Faq::find($id);
    $faq->question = $request->input("question");
    $faq->ans = $request->input("ans");
    $faq->dir_id = $id;
    $faq->save();
    return redirect("/dashboard/ref/faq/$ref_id")->with("success","Faq updated Successfull");
}



 // pop up 
 public function pop_up($id){
    $ref = Ref::find($id);
    $notice = Refnotice::where('ref_id', $id)->first();
    return view("dashboard.ref.popup", compact('ref', 'notice'));
}
public function pop_up_store($id, Request $request){

    $request->validate([
        "img"=> "required"
    ]);

    $ref = Ref::find($id);
    $popup = Refnotice::where('ref_id', $ref->id)->first();

    if($popup){
        $popup->img = $request->input('img');
        $popup->text = $request->input('text');
        $popup->link = $request->input('link');
        $popup->save();
    }else{
        $popup = new Refnotice();
        $popup->ref_id = $id;
        $popup->img = $request->input('img');
        $popup->text = $request->input('text');
        $popup->link = $request->input('link');
        $popup->save();
    }
    return redirect()->back()->with('success' , "Image Save sucessfull");
}

public function toggle_status_popup($id){
    $ref = Ref::find($id);
    if($ref->pop_up == "off"){
        $ref->pop_up = "on";
        $ref->save();
    }else{
        $ref->pop_up = "off";
        $ref->save();
    }
    return redirect()->back()->with("success","Status Updated Succesfull");
}



}
