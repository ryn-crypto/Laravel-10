<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        // elequent
        // -------------------
        $student = Student::all();
        return view('student', ['studentList' => $student]);

        // query builder
        // -------------------
        // $student = DB::table('students')->get();
        // return view('student', ['studentList' => $student]);
    }

    public function insert()
    {
        // query builder 
        // -------------
        // DB::table('students')->insert([
        //     'name' => 'Hamdan',
        //     'gender' => 'L',
        //     'nis' => '00998833',
        //     'class_id' => '1'
        // ]);

        // elequent 
        // -------------
        Student::create([
            'name' => 'aiini',
            'gender' => 'P',
            'nis' => '00998763',
            'class_id' => '2'
        ]);
    }

    public function update()
    {
        // query builder 
        // -------------
        // DB::table('students')->where('id', 27)->update([
        //     'name' => 'sudah di ganti',
        //     'class_id' => 2,
        // ]);

        // elequent 
        // -------------
        Student::findOrFail(28)->update([
            'name' => 'ini juga di ganti',
            'class_id' => 1
        ]);
    }

    public function delete()
    {
        // query builder 
        // -------------
        // DB::table('students')->where('id', 27)->delete();

        // elequent 
        // -------------
        Student::find(28)->delete();
    }
}
