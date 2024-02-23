<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::all();
        return view("pages.index", compact("projects"));
    }
    public function destroy($id)
    {
        $project = Project::find($id);

        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('index');
    }
    public function create()
    {

        $technologies = Technology::all();
        $types = Type::all();
        return view('pages.create', compact('technologies', 'types'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $type = Type::find($data['type_id']);

        $project = new Project();

        $project->name = $data['name'];
        $project->description = $data['description'];

        $project->type()->associate($type);

        $project->save();

        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('index');
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $type = Type::find($data['type_id']);

       $project = Project :: find($id);

        $project->name = $data['name'];
        $project->description = $data['description'];

        $project->type()->associate($type);

        
        $project->save();
        
            $project->technologies()->sync($data['technology_id']);
            return redirect()->route('pages.show', $project->id);
        

    } 

          
    
    public function edit($id)
    {
        $project = Project::find($id);
        $type = Type::all();
        $technology = Technology::all();

        return view('pages.edit', compact('project', 'type', 'technology'));
    }


    public function show($id)
    {
        $project = Project::find($id);

        return view('pages.show', compact('project'));
    }
}
