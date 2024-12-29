<?php

namespace App\Http\Controllers;

use App\Models\Dir;
use App\Models\Dirnotice;
use App\Models\Enquire;
use App\Models\Faq;
use App\Models\Sitemap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DirController extends Controller
{
    public function create()
    {
        $dir = Dir::where('email', auth()->user()->email)->get();
        return view("dashboard.dir.create", compact('dir'));
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
            'og' => 'required',
            'status' => 'required',
        ]);


        $ref = new Dir();
        $ref->email = auth()->user()->email;
        $ref->slug = $request->input('slug');
        $ref->title = $request->input('title');
        $ref->content = $request->input('content');
        $ref->meta_keyword = $request->input('meta_keyword');
        $ref->meta_description = $request->input('meta_description');
        $ref->banner_head = $request->input('banner_head');
        $ref->banner_head_two = $request->input('banner_head_two');
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
        $ref->save();
        return redirect('/dashboard/dir/list')->with('success', 'Create Successfully');
    }
    public function edit_store($id, Request $request)
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
        ]);


        $ref = Dir::find($id);
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
        $ref->save();
        return redirect('/dashboard/dir/list')->with('success', 'Updated Successfully');
    }


    public function list()
    {
        $dir = Dir::all();
        $mydir = Dir::where('email', auth()->user()->email)->get();

        if (auth()->user()->role == 'superadmin') {
            return view('dashboard.dir.list', ['dir' => $dir]);
        } else {
            return view('dashboard.dir.list', ['dir' => $mydir]);
        }
    }


    public function update($id, Request $request)
    {
        $dir = Dir::find($id);
        $contact = $request->input('contact');
        $enquire = $request->input('enquire');
        $status = $request->input('status');
        $menu = $request->input('menu');





        if ($status) {
            $dir->status = "Published";
            $dir->save();

            $slug = $dir->slug;
            $sitemap = new Sitemap();
            $sitemap->slug = "https://rafusoft.com/dir/" . $slug;
            $sitemap->save();
        } else {
            $dir->status = "Unpublished";
            $dir->save();

            $slug = "https://rafusoft.com/dir/" . $dir->slug;
            $sitemap = Sitemap::where("slug", "=", $slug)->delete();
        }

        if ($menu) {
            $dir->menu = 1;
            $dir->save();
        } else {
            $dir->menu = 0;
            $dir->save();
        }

        if ($contact) {
            $dir->contact = 1;
            $dir->save();
        } else {
            $dir->contact = 0;
            $dir->save();
        }
        if ($enquire) {
            $dir->enquire = 1;
            $dir->save();
        } else {
            $dir->enquire = 0;
            $dir->save();
        }

        return redirect()->back()->with('success', 'Status Updated Successfully');
    }


    public function edit($id)
    {
        $dir = Dir::find($id);
        return view('dashboard.dir.edit', ['dir' => $dir]);
    }


    public function preview($slug)
    {
        $dir = Dir::where('slug', $slug)->first();
        if (!$dir) {
            return view('error.404');
        }

        return view('dashboard.preview.dir.index', compact('dir'));
    }


    public function view($slug)
    {
        $dir = Dir::where('slug', $slug)->first();
        
        if (!$dir) {
            return view('error.404');
        }
        
        $notice = Dirnotice::where('dir_id', $dir->id)->first();


        

        if ($dir->status == "Published") {
            $faq = Faq::where('dir_id', '=', $dir->id)->get();
            return view('dir.index', compact('dir', 'faq', 'notice'));
        } else {
            return view('error.404');
        }
    }


    public function delete_dir($id)
    {
        $ref = Dir::where('id', $id)->firstOrFail();
        $ref->delete();
        return redirect()->back()->with('success', 'Delete Successfull');
    }


    // faq 



    public function faq($id)
    {
        $dir = Dir::where('id', $id)->first();
        $faq = Faq::where('dir_id', $id)->get();
        return view('dashboard.dir.faq', compact('dir', 'faq'));
    }



    public function toggle_status($id, Request $request)
    {
        $dir = Dir::find($id);
        if ($dir->faq == "off") {
            $dir->faq = "on";
            $dir->save();
        } else {
            $dir->faq = "off";
            $dir->save();
        }


        return redirect()->back()->with("success", "Status Updated Succesfull");
    }


    public function faq_store($id, Request $request)
    {
        $validate = $request->validate([
            "question" => "required",
            "ans" => "required",
        ]);

        $faq = new Faq();
        $faq->question = $request->input("question");
        $faq->ans = $request->input("ans");
        $faq->dir_id = $id;
        $faq->save();
        return redirect()->back()->with("success", "New Faq Added Successfull");
    }
    public function faq_update_store($id, $dir_id, Request $request)
    {
        $validate = $request->validate([
            "question" => "required",
            "ans" => "required",
        ]);

        $faq = Faq::find($id);
        $faq->question = $request->input("question");
        $faq->ans = $request->input("ans");
        // $faq->dir_id = $id;
        $faq->save();
        return redirect("/dashboard/dir/faq/$dir_id")->with("success", "New Faq Added Successfull");
    }


    public function faq_delete($id)
    {
        Faq::find($id)->delete();
        return redirect()->back()->with("success", "Delete Successfull");
    }


    public function faq_update($id)
    {
        $faq = Faq::find($id);
        return view("dashboard.dir.faq_edit", compact("faq"));
    }





    // pop up 
    public function pop_up($id)
    {
        $dir = Dir::find($id);
        $notice = Dirnotice::where('dir_id', $id)->first();
        return view("dashboard.dir.popup", compact('dir', 'notice'));
    }
    public function pop_up_store($id, Request $request)
    {

        $request->validate([
            "img" => "required"
        ]);

        $dir = Dir::find($id);
        $popup = Dirnotice::where('dir_id', $dir->id)->first();

        if ($popup) {
            $popup->img = $request->input('img');
            $popup->text = $request->input('text');
            $popup->link = $request->input('link');
            $popup->save();
        } else {
            $popup = new Dirnotice();
            $popup->dir_id = $id;
            $popup->img = $request->input('img');
            $popup->text = $request->input('text');
            $popup->link = $request->input('link');
            $popup->save();
        }


        return redirect()->back()->with('success', "Image Save sucessfull");
    }

    public function toggle_status_popup($id)
    {
        $dir = Dir::find($id);
        if ($dir->pop_up == "off") {
            $dir->pop_up = "on";
            $dir->save();
        } else {
            $dir->pop_up = "off";
            $dir->save();
        }
        return redirect()->back()->with("success", "Status Updated Succesfull");
    }




    public function enquires()
    {

        $email = auth()->user()->email;
        $enquire = Enquire::where('authar', $email)->paginate(25);

        $unread = Enquire::where('authar', auth()->user()->email)->where('status', 0)->get();
        $unread = count($unread);

        $total = Enquire::where('authar', auth()->user()->email)->get();
        $total = count($total);

        return view("dashboard.dir.enquire", compact('enquire', 'total', 'unread'));
    }



    public function files()
    {
        $userId = auth()->user()->user_id;
        $directories = [
            'favicon' => public_path("filemanager/favicon/$userId"),
            'og_image' => public_path("filemanager/og_image/$userId"),
            'schema_image' => public_path("filemanager/schema_image/$userId"),
            'publisher_image' => public_path("filemanager/publisher_image/$userId"),
            'pop_up' => public_path("filemanager/pop-up/$userId"),
            'custom' => public_path("filemanager/custom/$userId"),
        ];
    
        $totalSizeBytes = 0;

        foreach ($directories as $dir) {
            if (File::exists($dir)) {
                $files = File::files($dir);
                foreach ($files as $file) {
                    $totalSizeBytes += $file->getSize();
                }
            }
        }
    
        $totalSizeMB = $totalSizeBytes / (1024 * 1024);
        $totalSizeMBFormatted = number_format($totalSizeMB, 2);
        return view('dashboard.dir.files', compact('totalSizeMBFormatted'));
    }
    public function files_upload($file)
    {

        $mypath = auth()->user()->user_id;
        $files = $file;

        $destinationPath = public_path("filemanager/$file/$mypath");
         if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }
        $images = File::allFiles($destinationPath);

        $height = '';
        $width = '';
        $title = '';

        if ($file == 'favicon') {
            $height = 32;
            $width = 32;
            // $_title = ;
            $title = 'Upload Favicon | ' . $width.'x'.$height.'px '. ' .ico, .png';
        }

        if($file == "og_image"){
            $width = 1200;
            $height = 630;
            $title = 'Upload Open Graph Image | ' .  $width.'x'.$height.'px '. ' .png, .jpg, .jpeg, ';
        }

        if($file == "schema_image"){
            $width = 92;
            $height = 92;
            $title = 'Upload Schema Image | ' .  $width.'x'.$height.'px '. ' .png, .jpg, .jpeg, ';
        }

        if($file == "publisher_image"){
            $width = 200;
            $height = 200;
            $title = 'Upload Publisher Image | ' .  $width.'x'.$height.'px '. ' .png, .jpg, .jpeg';
        }
        if($file == "pop-up"){
            $width = 665;
            $height = 345;
            $title = 'Upload Pop Up Image | ' .  $width.'x'.$height.'px '. ' .png, .jpg, .jpeg';
        }
        if($file == "custom"){
            $width = 0;
            $height = 0;
            $title = "Upload Image | .jpg, .jpeg, .png. svg. gif";
        }


        $userId = auth()->user()->user_id;

        $directories = [
            'favicon1' => public_path("filemanager/favicon/$userId"),
            'og_image1' => public_path("filemanager/og_image/$userId"),
            'schema_image1' => public_path("filemanager/schema_image/$userId"),
            'publisher_image1' => public_path("filemanager/publisher_image/$userId"),
            'pop_up1' => public_path("filemanager/pop-up/$userId"),
            'custom1' => public_path("filemanager/custom/$userId"),
        ];
    
        $totalSizeBytes = 0;


        foreach ($directories as $dir) {
            if (File::exists($dir)) {
                $files1 = File::files($dir);
                foreach ($files1 as $file) {
                    $totalSizeBytes += $file->getSize();
                }
            }
        }
    
        $totalSizeMB = $totalSizeBytes / (1024 * 1024);
        $size = number_format($totalSizeMB, 2);



        return view('dashboard.dir.files_upload',  compact('height', 'width', 'title', 'images', 'files', 'size' ));
    }


    public function files_upload_store($file_path, Request $request){
        $this->validate($request, [
            'file' => 'required|image',
        ]);
        $file = $request->file("file");
        $name = $file->getClientOriginalName();
        $mypath = auth()->user()->user_id;


        $destinationPath = public_path("filemanager/$file_path/$mypath");
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $file->move($destinationPath, $name);
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }


    
    public function rename($file, Request $request)
    {
        $filename = $request->input('name');
        $newname = $request->input('newname');
        if ($filename && $newname) {
           
            $mypath = auth()->user()->user_id;
            $destinationPath = public_path("filemanager/$file/$mypath");
    
            if(auth()->user()->role == "superadmin"){
                $destinationPath = public_path('icons');
            }



            $icons = File::allFiles($destinationPath);

            foreach ($icons as $file) {
                if ($file->getFilename() === $filename) {
                    $oldPath = $file->getPathname();
                    $newPath = $file->getPath() . DIRECTORY_SEPARATOR . $newname;
                    if (rename($oldPath, $newPath)) {
                        return redirect()->back()->with('success', 'File renamed successfully!');
                    } else {
                        return redirect()->back()->with('error', 'Failed to rename the file!');
                    }
                }
            }

            return redirect()->back()->with('error', 'File not found!');
        }

        return redirect()->back()->with('error', 'Invalid filename or newname!');
    }


    public function delete($file, Request $request)
    {
        $name = $request->input('name');
        

        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/$file/$mypath");


        $filePath = $destinationPath . '/' . $name;
        if (File::exists($filePath)) {
            if (unlink($filePath)) {

                return redirect()->back()->with('success', 'File deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to delete the file!');
            }
        }
        return redirect()->back()->with('error', 'File not found!');
    }

}
