<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function create(Request $request){

        return view("dashboard.gallery.index",);    
    }


    public function store_image(Request $request){
        $validate = $request->validate([
            "title"=> "required",
            "short_paragraph"=> "required|max:45",
            "photo"=> "required",
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->input("title");
        $gallery->short_paragraph = $request->input("short_paragraph");
        $gallery->photo = $request->input("photo");
        $gallery->save();
        return redirect()->back()->with("success","Image Uploaded Sucessfull");
    }

    public function index(Request $request){


        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/gallery/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('gallery');
        }


        $image = File::allFiles($destinationPath);
        return view("dashboard.file.gallery.index", ['icons' => $image]);    
    }

    public function store(Request $request){
        $this->validate($request, [
            'file' => 'required|image',
        ]);

        $file = $request->file("file");
        $name = $file->getClientOriginalName();
        $filenameWithoutExtension = pathinfo($name, PATHINFO_FILENAME);

        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/gallery/$mypath");

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('gallery');
        }

        if (File::exists($destinationPath . '/' . $filenameWithoutExtension.".png")) {
            return redirect()->back()->with('error', 'An image with the same name already exists.');
        }

        $imageData = $request->input('obj');
        $image = imagecreatefrompng($imageData);


        imagejpeg($image, "$destinationPath/".$filenameWithoutExtension.".png", 100);
        imagedestroy($image);
        return redirect()->back()->with('success', 'Icon uploaded successfully!');
    }



    public function rename(Request $request)
    {
        $filename = $request->input('name');
        $newname = $request->input('newname');
        if ($filename && $newname) {
           

            $mypath = auth()->user()->user_id;
            $destinationPath = public_path("filemanager/gallery/$mypath");
    
            if(auth()->user()->role == "superadmin"){
                $destinationPath = public_path('gallery');
            }



            $icons = File::allFiles($destinationPath);

            foreach ($icons as $file) {
                if ($file->getFilename() === $filename . ".png") {
                    $oldPath = $file->getPathname();
                    $newPath = $file->getPath() . DIRECTORY_SEPARATOR . $newname . ".png";
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


    public function delete(Request $request)
    {
       

        $name = $request->input('name');
        

        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/gallery/$mypath");

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('gallery');
        }


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



    public function image_list(){
        $gallery  = Gallery::all();
        return view('dashboard.gallery.list', compact('gallery'));
    }



    public function update_image($id, Request $request){
        $gallery = Gallery::find($id);
        $gallery->title = $request->input('title');
        $gallery->short_paragraph = $request->input('short_paragraph');
        $gallery->save();
        return redirect()->back()->with('success','Updated Successfull');
    }



    public function delete_gallery($id){
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->back()->with('success','Delete Successfull');
    }



    public function update_status($id){
        $gallery = Gallery::find($id);
        
        if($gallery->status == "Active"){
            $gallery->status = "Deactive";
            $gallery->save();
        }else{
            $gallery->status = "Active";
            $gallery->save();
        }
        return redirect()->back()->with('success','Gallery Update Successfull');
    }
}

