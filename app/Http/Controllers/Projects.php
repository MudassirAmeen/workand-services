<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Projects as ModelsProjects;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Projects extends Controller
{

    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'name'            => 'required|max:100',
            'image'           => 'required',
            'alttext'         => 'required',
            'longdescription' => 'required',
            'category'        => 'required'
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ModelsProjects::paginate(10);
        $totalProjects = ModelsProjects::count();
        return view('Admin.Table.project', compact('projects', 'totalProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('Admin.Add.project', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newProject = new ModelsProjects($validateData);

        // Save the Project image
        $image             = $validateData['image'];
        $newProject->image = $image;
        $newProject->save();

        return redirect()->route('project.index')->with('message', "Project Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = ModelsProjects::find($id);
        return view('Admin.Show_One_Result.project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project  = ModelsProjects::find($id);
        $categories = Category::all();
        return view('Admin.Edit.project', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name'            => 'required|max:100',
            'longdescription' => 'required',
            'category'        => 'required'
        ]);

        $updateProject = ModelsProjects::find($id);
        $updateProject->update($validate);

        return redirect()->route('project.index')->with('message', "Project Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = ModelsProjects::find($id);
        $project->delete();
        return redirect()->route('project.index')->with('message', 'Project Deleted Successfully.');
    }
}
