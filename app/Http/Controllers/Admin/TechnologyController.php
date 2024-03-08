<?php

namespace App\Http\Controllers\Admin;

//model
use App\Models\Technology;

//helper
use Illuminate\Support\Str;
//formrequest
use App\Http\Requests\FormRequest\Technology\StoreTechnologyRequest;
use App\Http\Requests\FormRequest\Technology\UpdateTechnologyRequest;

//controller
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $technologyData = $request->validate([
            'title' => 'required|string|max:32'
        ]);

        $slug = Str::slug($technologyData['title']);

        $technology = Technology::create([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $technologyData = $request->validate([
            'title' => 'required|string|max:32'
        ]);

        $slug = Str::slug($technologyData['title']);

        $technology ->update([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index', ['technology' => $technology->id]);
    }
}
