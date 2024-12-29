<?php
namespace App\Http\Controllers;
use App\Models\Sitemap;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;
class SitemapController extends Controller
{
    public function index(){
        $sitemaps = Sitemap::orderBy("created_at","desc")->get();
        return view("dashboard.sitemap.index" , compact("sitemaps"));
    }
     public function store(Request $request){
        $validatedData = $request->validate([
            'slug' => [
                'required',
                'unique:sitemaps',
            ],
        ]);



        $sitemap = new Sitemap();
        $sitemap->slug = $request->input('slug');   
        $sitemap->save();
        return redirect()->back()->with('success','Slug Added Successfull');
    }



    public function show(): Response {
        $sitemaps = Sitemap::all();
        return FacadesResponse::view('sitemap.index', compact('sitemaps'))->header('content-type', 'text/xml');
    }




    public function delete($id){
        $sitemap = Sitemap::find($id);
        $sitemap->delete();
        return redirect()->back()->with('success','Delete Successfull');
    }


    public function export()
    {
        $sitemaps = Sitemap::all();
        
        $filename = 'sitemap.txt';
        
        $fileContent = $sitemaps->pluck('slug')->implode("\n");

        return response($fileContent, 200)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    
}
