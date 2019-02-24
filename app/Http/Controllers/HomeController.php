<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function myAchievement()
    {
        return view('user.my-achievement.my-achievement');
    }

    public function myProfile()
    {
        return view('user.my-profile.my-profile');
    }

    public function updateMyProfile(Request $request, $id)
    {
        $this->validate($request, [
            'nim' => "required|unique:users,nim,$id|numeric|min:8",
            'name' => 'required|min:5',
            'email' => "required|email|unique:users,email,$id",
            'gender' => 'required',
            'blood_type' => '',
            'place_of_birth' => '',
            'date_of_birth' => '',
            'religion' => '',
            'phone' => 'required|numeric',
            'image' => 'max:2048|mimes:jpg,png,jpeg',
        ]);
        $student = User::where('id', $id)->first();
        if ($request->image != null) {
            Storage::delete($student->image);
            $image = $request->file('image')->store('users');
            $student->image = $image;
        }
        if ($request->password != null) {
            $student->password = bcrypt($request->password);
        }
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->place_of_birth = $request->place_of_birth;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->blood_type = $request->blood_type;
        $student->email = $request->email;
        $student->religion = $request->religion;
        $student->phone = $request->phone;
        $student->update();
        return redirect()->route('my-profile')->with(['success' => 'Your profile updated successfully']);
    }
}
