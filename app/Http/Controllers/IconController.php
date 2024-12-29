<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class IconController extends Controller
{
    public function index()
    {

        $mypath = auth()->user()->user_id;

        $destinationPath = public_path("filemanager/icons/$mypath");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('icons');
        }
        
        $icons = File::allFiles($destinationPath);
        return view("dashboard.file.icon.index", ["icons" => $icons]);
    }




    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|file|mimes:ico|max:2048',
        ]);

        $mypath = auth()->user()->user_id;
        $destinationPath = public_path("filemanager/icons/$mypath");

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('icons');
        }


        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();



        if (File::exists($destinationPath . '/' . $iconName)) {
            return redirect()->back()->with('error', 'An icon with the same name already exists.');
        }

        $icon->move($destinationPath, $iconName);

        return redirect()->back()->with('success', 'Icon uploaded successfully!');
    }



    public function rename(Request $request)
    {
        $filename = $request->input('name');
        $newname = $request->input('newname');
        if ($filename && $newname) {
           
            $mypath = auth()->user()->user_id;
            $destinationPath = public_path("filemanager/icons/$mypath");
    
            if(auth()->user()->role == "superadmin"){
                $destinationPath = public_path('icons');
            }



            $icons = File::allFiles($destinationPath);

            foreach ($icons as $file) {
                if ($file->getFilename() === $filename . ".ico") {
                    $oldPath = $file->getPathname();
                    $newPath = $file->getPath() . DIRECTORY_SEPARATOR . $newname . ".ico";
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
        $destinationPath = public_path("filemanager/icons/$mypath");

        if(auth()->user()->role == "superadmin"){
            $destinationPath = public_path('icons');
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
