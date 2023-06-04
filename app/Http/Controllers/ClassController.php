<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        // lazy load
        // $class = ClassRoom::all();
        // eager load
        $class = ClassRoom::with('students', 'teacher')->get();
        return view('classroom', ['classList' => $class]);
    }
}
