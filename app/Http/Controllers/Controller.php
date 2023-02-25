<?php

namespace App\Http\Controllers;

use App\Models\NewUsers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function loginForm()
    {
        return view('Authentication.login');
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('new_users')->where(['email' => $request->email, 'password' => $request->password])->first();

        if ($user) {
            Session::put('User_id', $user->id);
            Session::put('User_name', $user->fname);
            return redirect()->route('AdminHome');
        } else {
            return redirect()->back()->with('message', 'Your Credidentials are incorrect.');
        }
    }

    public function dashboard()
    {
        $authId = Session::get('User_id');
        $user = NewUsers::where('id', $authId)->first();
        if ($user->role == 1) {
            return view('Admin.Dashboard', compact('user'));
        } else {
            return redirect('/');
        }
    }


    public function signupForm()
    {
        return view('Authentication.signup');
    }

    public function signup(Request $request)
    {
        $validate = $request->validate([
            'email'    => 'required|email|unique:new_users,email',
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

        $newUser = new NewUsers($validate);

        $newUser->save();

        Session::put('User_id', $newUser->id);
        Session::put('User_name', $newUser->fname);

        return redirect()->route('AdminHome')->with('message', "User Added Successfully.");
    }

    public function crop(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $imageExtention = $image->extension();
        $fullImageName = $imageName . "." . $imageExtention;
        $imagePath = $image->storeAs("public/AdminPanel/assets/Features", $fullImageName);

        if ($imagePath) {
            return response()->json([
                'status' => 1,
                'msg' => $fullImageName
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Error storing image'
            ]);
        }
    }

    public function logout()
    {
        Session::forget('User_id');
        return redirect()->back();
    }
}
