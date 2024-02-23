<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
class ProjectController extends Controller
{
    public function index(){

        $projects = Project::all();
        return view("pages.index", compact("projects"));
    }
    public function destroy($id){
        $project = Project::find($id);

        $project -> delete();
        

        return redirect() -> route('index');
    }
}
