<?php

namespace App\Http\Controllers;

use App\Admin;
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
        ];
        return view('admin.home', compact('total'));
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
        $students = User::all();
        return view('admin.users.student.student', compact('students'));
    }

    public function viewStudent()
    {
        $students = User::all();
        return view('admin.student.student', compact('students'));
    }

    public function viewStudentDetail($id)
    {
        $student = User::find($id);
        return view('admin.student.detail-student', compact('student'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $image = $request->file('image')->store('admins');
        $admin->image = $image;
        $admin->save();
        return redirect()->route('admin.user-admin')->with(['success' => 'New administrator create successfully']);
    }

    public function storeLecturer(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::where('id', $id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password != null){
            $admin->password = bcrypt($request->password);
        }
        if ($request->image != null){
            Storage::delete($admin->image);
            $image = $request->file('image')->store('admins');
            $admin->image = $image;
        }

        // dd($admin);
        $admin->update();
        return redirect()->route('admin.user-admin')->with(['success' => 'Chosen administrator updated successfully']);
    }

    public function updateLecturer(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
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
}
