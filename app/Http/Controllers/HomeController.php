<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $achievements = Achievement::select('*')->join('users', 'users.nim', '=', 'achievements.nim')
            ->orderBy('achievements.created_at', 'DESC')
            ->paginate(3);
        return view('user.home', compact('achievements'));
    }

    public function myAchievement()
    {
        $achievements = Achievement::select('*', 'achievements.id as achievement_id')->join('users', 'users.nim', '=', 'achievements.nim')
            ->where('achievements.nim', Auth::user()->nim)->paginate(3);
        return view('user.my-achievement.my-achievement', compact('achievements'));
    }

    public function editAchievement($id)
    {
        $achievement = Achievement::find($id);
        return view('user.my-achievement.update-my-achievement', compact('achievement'));
    }

    public function updateAchievement(Request $request, $id)
    {
        $this->validate($request, [
            'team_name' => 'required',
            'achievement' => 'required',
            'prize' => 'required|numeric',
            'competition' => 'required',
            'place_of_competition' => 'required',
            'date_of_competition' => 'required',
            'image' => ''
        ]);
        $achievement = Achievement::find($id);
        $achievement->team_name = $request->team_name;
        $achievement->achievement = $request->achievement;
        $achievement->prize = $request->prize;
        $achievement->competition = $request->competition;
        $achievement->place_of_competition = $request->place_of_competition;
        $achievement->date_of_competition = $request->date_of_competition;
        if ($request->image != null) {
            Storage::delete($achievement->certificate);
            $image = $request->file('image')->store('achievements');
            $achievement->certificate = $image;
        }
        $achievement->update();
        return redirect()->route('my-achievement')->with(['success' => 'Chosen achievement updated successfully']);
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

    public function storeMyAchievement(Request $request)
    {
        $this->validate($request, [
            'team_name' => 'required',
            'achievement' => 'required',
            'prize' => 'required|numeric',
            'competition' => 'required',
            'place_of_competition' => 'required',
            'date_of_competition' => 'required',
            'image' => 'required'
        ]);
        $achievement = new Achievement();
        $achievement->nim = Auth::user()->nim;
        $achievement->team_name = $request->team_name;
        $achievement->achievement = $request->achievement;
        $achievement->prize = $request->prize;
        $achievement->competition = $request->competition;
        $achievement->place_of_competition = $request->place_of_competition;
        $achievement->date_of_competition = $request->date_of_competition;
        $image = $request->file('image')->store('achievements');
        $achievement->certificate = $image;
        $achievement->save();
        return redirect()->route('my-achievement')->with(['success' => 'New achievement uploaded successfully']);
    }

    public function destroyAchievement($id)
    {
        $achievement = Achievement::find($id);
        $achievement->delete();
        return redirect()->route('my-achievement')->with(['success' => 'Chosen achievement deleted successfully']);
    }
}
