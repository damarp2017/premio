<?php

namespace App\Http\Controllers;

use App\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }
    public function index()
    {
        return view('lecturer.home');
    }

}
