<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extrakurikuler;

class ExtrakurikulerController extends Controller
{
    public function index()
    {
        $ekskul = Extrakurikuler::get();
        return view('extrakurikuler', ['exkulList' => $ekskul]);
    }
}
