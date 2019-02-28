<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }

    public function myProfile()
    {
        return view('lecturer.profile');
    }

    public function updateMyProfile(Request $request, $id)
    {
        $this->validate($request, [
            'nipy' => "required|numeric|min:8|unique:lecturers,nipy,$id",
            'name' => 'required|min:5',
            'email' => "required|email|unique:lecturers,email,$id",
            'password' => '',
            'image' => 'max:2048|mimes:jpeg,png,jpeg'
        ]);
        $lecturer = Lecturer::where('id', $id)->first();
        $lecturer->nipy = $request->nipy;
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        if ($request->password != null) {
            $lecturer->password = bcrypt($request->password);
        }
        if ($request->image != null) {
            Storage::delete($lecturer->image);
            $image = $request->file('image')->store('lecturers');
            $lecturer->image = $image;
        }
        $lecturer->update();
        return redirect()->route('lecturer.my-profile')->with(['success' => 'Your profile updated successfully']);
    }

    public function index()
    {
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->orderBy('achievements.created_at', 'DESC')
            ->paginate(3);
        return view('lecturer.home', compact('achievements'));
    }

    public function student()
    {
        $students = User::all();
        return view('lecturer.student.student', compact('students'));
    }

    public function studentDetail($id)
    {
        $student = User::find($id);
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->where('users.nim', $student->nim)
            ->orderBy('achievements.created_at', 'DESC')->get();
        return view('lecturer.student.detail-student', compact('student', 'achievements'));
    }

    public function achievement()
    {
        $count = count(Achievement::all());
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->orderBy('achievements.created_at', 'DESC')
            ->paginate(20);
        return view('lecturer.achievement.achievement', compact('achievements', 'count'));
    }

}
