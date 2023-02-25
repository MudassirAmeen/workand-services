<?php

namespace App\Http\Controllers;

use App\Models\Teammembers as ModelsTeammembers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamMembers extends Controller
{
    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'name'        => 'required|max:100',
            'image'       => 'required',
            'alttext'     => 'required',
            'role'        => 'required',
            'experience'  => 'required',
            'description' => 'required',
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers = ModelsTeammembers::paginate(10);
        $totalteamMembers = ModelsTeammembers::count();
        return view('Admin.Table.team', compact('teamMembers', 'totalteamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.team');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newTeamMember = new ModelsTeammembers($validateData);

        // Save the Team Member image
        $image                = $validateData['image'];
        $newTeamMember->image = $image;
        $newTeamMember->save();

        return redirect()->route('team.index')->with('message', "Team Member Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teamMember = ModelsTeammembers::find($id);
        return view('Admin.Show_One_Result.team', compact('teamMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teamMember = ModelsTeammembers::find($id);
        return view('Admin.Edit.team', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name'        => 'required|max:100',
            'role'        => 'required',
            'experience'  => 'required',
            'description' => 'required',
        ]);

        $updateTeamMember = ModelsTeammembers::find($id);
        $updateTeamMember->update($validate);

        return redirect()->route('team.index')->with('message', "Team Member Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teamMember = ModelsTeammembers::find($id);
        $teamMember->delete();
        return redirect()->route('team.index')->with('message', 'Team Member Deleted Successfully.');
    }
}
