<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extrakurikuler;

class ExtrakurikulerController extends Controller
{
    public function index()
    {
        $ekskul = Extrakurikuler::with('students')->get();
        return view('extrakurikuler', ['exkulList' => $ekskul]);
    }
}
