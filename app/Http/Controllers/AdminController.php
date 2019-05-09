<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Admin;
use App\Grade;
use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function myprofile()
    {
        return view('admin.profile');
    }

    public function updateMyProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => "required|email|unique:admins,email,$id",
            'password' => '',
            'image' => 'max:2048|mimes:jpeg,png,jpeg'
        ]);
        $admin = Admin::where('id', $id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password != null) {
            $admin->password = bcrypt($request->password);
        }
        if ($request->image != null) {
            Storage::delete($admin->image);
            $image = $request->file('image')->store('admins');
            $admin->image = $image;
        }
        $admin->update();
        return redirect()->route('admin.my-profile')->with(['success' => 'Your profile updated successfully']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = [
            'admin' => count(Admin::all()),
            'lecturer' => count(Lecturer::all()),
            'student' => count(User::all()),
            'achievement' => count(Achievement::all()),
        ];
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->orderBy('achievements.created_at', 'DESC')
            ->paginate(3);
        return view('admin.home', compact('total', 'achievements'));
    }

    public function viewUserAdmin()
    {
        $admins = Admin::all();
        return view('admin.users.admin.admin', compact('admins'));
    }

    public function viewUserLecturer()
    {
        $lecturers = Lecturer::all();
        return view('admin.users.lecturer.lecturer', compact('lecturers'));
    }

    public function viewUserStudent()
    {
        $students = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users.student.student', compact('students'));
    }

    public function viewStudent()
    {
        $students = User::orderBy('created_at', 'DESC')->get();
        return view('admin.student.student', compact('students'));
    }

    public function viewStudentDetail($id)
    {
        $student = User::find($id);
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->where('users.nim', $student->nim)
            ->orderBy('achievements.created_at', 'DESC')->get();
        return view('admin.student.detail-student', compact('student', 'achievements'));
    }

    public function viewAchievement()
    {
        $count = count(Achievement::all());
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->orderBy('achievements.created_at', 'DESC')
            ->paginate(20);
        return view('admin.achievement.achievement', compact('achievements', 'count'));
    }

    public function viewGrade() {
        $grades = Grade::all();
        return view('admin.grade.grade', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.admin.create-admin');
    }

    public function createLecturer()
    {
        return view('admin.users.lecturer.create-lecturer');
    }

    public function createStudent()
    {
        return view('admin.users.student.create-student');
    }

    public function createGrade() {
        return view('admin.grade.create-grade');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'image' => 'required|max:2048|mimes:jpg,png,jpeg'
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $image = $request->file('image')->store('admins');
        $admin->image = $image;
        $admin->save();
        return redirect()->route('admin.user-admin')->with(['success' => 'New administrator created successfully']);
    }

    public function storeLecturer(Request $request)
    {
        $this->validate($request, [
            'nipy' => 'required|unique:lecturers|numeric|min:8',
            'name' => 'required|min:5',
            'email' => 'required|email|unique:lecturers',
            'password' => 'required|min:6',
            'image' => 'required|max:2048|mimes:jpg,png,jpeg',
        ]);
        $lecturer = new Lecturer();
        $lecturer->nipy = $request->nipy;
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->password = bcrypt($request->password);
        $image = $request->file('image')->store('lecturers');
        $lecturer->image = $image;
        $lecturer->save();
        return redirect()->route('admin.user-lecturer')->with(['success' => 'New lecturer created successfully']);
    }

    public function storeStudent(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|unique:users|numeric|min:8',
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'image' => 'required|max:2048|mimes:jpg,png,jpeg',
        ]);
        $student = new User();
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $image = $request->file('image')->store('users');
        $student->image = $image;
        $student->password = bcrypt($student->nim);
        $student->save();
        return redirect()->route('admin.user-student')->with(['success' => 'New student created successfully']);
    }

    public function storeGrade(Request $request) {
        $this->validate($request, [
           'grade_name' => 'required|unique:grades',
        ]);
        $grade = new Grade();
        $grade->grade_name = strtoupper($request->grade_name);
        $grade->save();
        return redirect()->route('admin.grade')->with(['success' => 'New Grade created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.users.admin.update-admin', compact('admin'));
    }

    public function editLecturer($id)
    {
        $lecturer = Lecturer::find($id);
        return view('admin.users.lecturer.update-lecturer', compact('lecturer'));
    }

    public function editGrade($id) {
        $grade = Grade::find($id);
        return view('admin.grade.update-grade', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => "required|email|unique:admins,email,$id",
            'password' => '',
            'image' => 'max:2048|mimes:jpeg,png,jpeg'
        ]);
        $admin = Admin::where('id', $id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password != null) {
            $admin->password = bcrypt($request->password);
        }
        if ($request->image != null) {
            Storage::delete($admin->image);
            $image = $request->file('image')->store('admins');
            $admin->image = $image;
        }
        $admin->update();
        return redirect()->route('admin.user-admin')->with(['success' => 'Chosen administrator updated successfully']);
    }

    public function updateLecturer(Request $request, $id)
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
        return redirect()->route('admin.user-lecturer')->with(['success' => 'Chosen lecturer updated successfully']);
    }

    public function updateStudent(Request $request, $id)
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
        return redirect()->route('admin.student-detail', $id)->with(['success' => 'Chosen student updated successfully']);
    }

    public function updateGrade(Request $request, $id) {
        $this->validate($request, [
           'grade_name' => 'required|unique:grades',
        ]);
        $grade =  Grade::where('id', $id)->first();
        $grade->grade_name = $request->grade_name;
        $grade->update();
        return redirect()->route('admin.grade')->with(['success' => 'Chosen grade updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        /*
         *
        if ($admin->delete()){
            Storage::delete($admin->image);
        }
         *
         */
        return redirect()->route('admin.user-admin')->with(['success' => 'Chosen administrator deleted successfullly']);
    }

    public function destroyLecturer($id)
    {
        $lecturer = Lecturer::find($id);
        $lecturer->delete();
        /*
         *
        if ($lecturer->delete()) {
            Storage::delete($lecturer->image);
        }
         *
         * */
        return redirect()->route('admin.user-lecturer')->with(['success' => 'Chosen lecturer deleted successfully']);
    }

    public function destroyStudent($id)
    {
        $student = User::find($id);
        $student->delete();
        /*
         *
         if ($student->delete()) {
            Storage::delete($student->image);
        }
         *
         * */
        return redirect()->route('admin.student')->with(['success' => 'Chosen student deleted successfully']);
    }
}
