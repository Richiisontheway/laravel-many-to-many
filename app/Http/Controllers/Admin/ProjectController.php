<?php

namespace App\Http\Controllers\Admin;
//model
use App\Models\Project;
use App\Models\Type;

use App\Http\Controllers\Controller;
//helper
use Illuminate\Support\Str;
//Form request
use Illuminate\Http\Request;
use App\Http\Requests\FormRequest\StoreProjectRequest;
use App\Http\Requests\FormRequest\UpdateProjectRequest;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return view('admin.projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();
        // $projects_data = $validatedData->all();
        $project = new Project();
        $project->title = $validatedData['title'];
        $project->description = $validatedData['description'];
        $project->image = $validatedData['image'];
        $project->date = $validatedData['date'];
        $project->slug = $validatedData['title'];
        $project->type_id = $validatedData["type_id"];
        $project->save();

         return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug',$slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $types = Type::all();
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $slug)
    {
        $validationData=$request->validated();

        $project = Project::where('slug', $slug)->firstOrFail();
        $slug = Str::slug($validationData['title']);
        $validationData['slug'] = $slug;
        
        
        $project->updateOrFail($validationData);
        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
