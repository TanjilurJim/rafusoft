<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaticImageController extends Controller
{
    public function index(Request $request){

        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/static_image/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('static_image');
        }


        $image = File::allFiles($destinationPath);
        return view("dashboard.file.static.index", ['icons' => $image]);    
    }

    public function store(Request $request){
        $this->validate($request, [
            'file' => 'required|image',
        ]);


        $file = $request->file('file');
        $iconName = $file->getClientOriginalName();
        


        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/static_image/$mypath");
        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('static_image');
        }



        if (File::exists($destinationPath . '/' . $iconName)) {
            return redirect()->back()->with('error', 'An icon with the same name already exists.');
        }

        $file->move($destinationPath, $iconName);
        return redirect()->back()->with('success', 'Image uploaded successfully!');

    }



    public function rename(Request $request)
    {
        $filename = $request->input('name');
        $newname = $request->input('newname');
        if ($filename && $newname) {
           


            $mypath = auth()->user()->user_id;
            $destinationPath = public_path("filemanager/static_image/$mypath");
    
            if(auth()->user()->role == "superadmin"){
                $destinationPath = public_path('static_image');
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


    public function delete(Request $request)
    {
       

        $name = $request->input('name');
       


        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/static_image/$mypath");

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('static_image');
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

