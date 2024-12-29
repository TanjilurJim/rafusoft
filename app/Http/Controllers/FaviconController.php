<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FaviconController extends Controller
{
    public function index(Request $request)
    {


        $mypath = auth()->user()->user_id;

        $destinationPath = public_path("filemanager/favicon/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('favicon');
        }

        
        $image = File::allFiles($destinationPath);
        return view("dashboard.file.favicon.index" ,["icons" => $image]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image',
        ]);
        $file = $request->file("file");
        $name = $file->getClientOriginalName();
        $filenameWithoutExtension = pathinfo($name, PATHINFO_FILENAME);




        $mypath = auth()->user()->user_id;

        $destinationPath = public_path("filemanager/favicon/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('favicon');
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

        $destinationPath = public_path("filemanager/favicon/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('favicon');
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

        $destinationPath = public_path("filemanager/favicon/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('favicon');
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


}

