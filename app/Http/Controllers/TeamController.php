<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function category()
    {

        $categories = TeamCategory::all()->sortBy('category_order');
        return view("dashboard.team.category", compact("categories"));
    }

    public function category_store(Request $request)
    {
        $validatedData = $request->validate([
            "category" => "required|unique:team_categories",
            "category_order" => "required|unique:team_categories"
        ]);


        $category = new TeamCategory();
        $category->category = $request->input("category");
        $category->category_order = $request->input("category_order");
        $category->save();
        return redirect()->back()->with("success", "Category created successfully.");
    }
    public function updated_category( $id ,Request $request)
    {
        $validatedData = $request->validate([
            "category" => "required",
            "category_order" => "required"
        ]);


        $category = TeamCategory::find($id);
        $category->category = $request->input("category");
        $category->category_order = $request->input("category_order");
        $category->save();
        return redirect()->back()->with("success", "Category created successfully.");
    }

    public function delete($id)
    {
        $teamCategory = TeamCategory::find($id);
        $teamCategory->delete();
        return redirect()->back()->with("success", "Category Delete Successfull");
    }

    public function create()
    {
        $categories = TeamCategory::all();

        return view("dashboard.team.create", compact("categories"));
    }


    public function create_store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "post" => "required",
            "photo" => "required",
            "category" => "required",
        ]);


        $team = new Team();
        $team->name = $request->input("name");
        $team->post = $request->input("post");
        $team->category = $request->input("category");
        $team->website = $request->input("website");
        $team->photo = $request->input("photo");
        $team->save();
        return redirect('/dashboard/team/team-members')->with("success", "Create successfull");
    }



    public function show()
    {
        $teams = Team::all();
        return view("dashboard.team.member", compact("teams"));
    }



    public function edit($id)
    {
        $team = Team::find($id);
        $categories = TeamCategory::all();
        return view("dashboard.team.edit", [
            "team" => $team,
            "categories" => $categories
        ]);
    }



    public function edit_store($id, Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "post" => "required",
            "category" => "required",
        ]);

        $team = Team::find($id);
        $team->name = $request->input("name");
        $team->post = $request->input("post");
        $team->category = $request->input("category");
        $team->website = $request->input("website");
        $team->photo = $request->input("photo");
        $team->save();
        return redirect('/dashboard/team/team-members')->with("success", "Updated Successfull");
    }



    public function update_status($id){
        $team = Team::find($id);

        if($team->status  == "Active"){
            $team = Team::find($id);
            $team->status = "Deactive";
            $team->save();
        }else{
            $team->status = "Active";
            $team->save();
        }
        return redirect()->back()->with('success', "Status Updated Successfull");
    } 


    public function delete_team($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect('/dashboard/team/team-members')->with("success", "Delete Successfull");
    }




}
