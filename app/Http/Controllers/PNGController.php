<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PNGController extends Controller
{
    public function index(Request $request){
       

        
        $mypath = auth()->user()->user_id;

        $destinationPath = public_path("filemanager/png/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('png');
        }


        $images = File::allFiles($destinationPath);
        return view("dashboard.file.png.index", ['images' => $images]);    
    }

    public function store(Request $request)
    {
        $request->validate([
            'png' => 'required|file|max:2048',
        ]);

        $icon = $request->file('png');
        $iconName = $icon->getClientOriginalName();
        


        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/png/$mypath");
        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('png');
        }



        if (File::exists($destinationPath . '/' . $iconName)) {
            return redirect()->back()->with('error', 'An icon with the same name already exists.');
        }

        $icon->move($destinationPath, $iconName);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    public function rename(Request $request)
    {
        $filename = $request->input('name');
        $newname = $request->input('newname');
        if ($filename && $newname) {
            

            $mypath = auth()->user()->user_id;
            $destinationPath = public_path("filemanager/png/$mypath");
            if(auth()->user()->role == "superadmin"){
                $destinationPath = public_path('png');
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
        $destinationPath = public_path("filemanager/png/$mypath");
        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('png');
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
