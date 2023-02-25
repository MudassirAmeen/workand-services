<?php

namespace App\Http\Controllers;

use App\Models\NewUsers as ModelsNewUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class NewUsers extends Controller
{

    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'email'    => 'required|email',
            'fname'    => 'required',
            'lname'    => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value == $request->input('email')) {
                        $fail('The password cannot be the same as your email.');
                    }
                },
            ],
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = ModelsNewUsers::paginate(10);
        $totalUsers = ModelsNewUsers::count();
        return view('Admin.Table.users', compact('users', 'totalUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Authentication.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newUser = new ModelsNewUsers($validateData);

        $newUser->save();

        Session::put('User_id', $newUser->id);
        Session::put('User_name', $newUser->fname);

        return redirect()->route('AdminHome')->with('message', "User Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = ModelsNewUsers::find($id);
        return view('Admin.Show_One_Result.user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = ModelsNewUsers::find($id);
        return view('Admin.Edit.user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'fname' => 'required',
            'lname' => 'required',
            'role'  => 'required'
        ]);

        $updateUser = ModelsNewUsers::find($id);
        $updateUser->update($validate);

        return redirect()->route('user.index')->with('message', "User Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = ModelsNewUsers::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('message', 'User Deleted Successfully.');
    }
}
