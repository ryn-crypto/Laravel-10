<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;


class TeachersController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher', ['teacherList' => $teacher]);
    }
}
