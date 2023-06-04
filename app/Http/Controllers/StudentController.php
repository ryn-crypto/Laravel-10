<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        // query builder
        // -------------------
        // $student = DB::table('students')->get();
        // return view('student', ['studentList' => $student]);

        // elequent
        // -------------------
        $student = Student::with(['class.teacher', 'extrakurikulers'])->get();
        return view('student', ['studentList' => $student]);
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

    public function nilai()
    {
        $nilai = [1, 2, 3, 4, 5, 6, 7, 7, 8, 8, 8, 9, 10, 2, 1, 3, 4, 5];

        // php native
        // ==========================
        $jml_nilai = count($nilai);
        $total_nilai = array_sum($nilai);
        $rata_rata = $total_nilai / $jml_nilai;

        // collection
        $rata_rata = collect($nilai)->average();

        // contains = untuk mengetahui isi array (apakah memiliki nilai yang dicari)
        $nilai_sempurna = collect($nilai)->contains(function ($value) {
            return $value < 0;
        });

        // diff (untuk melakukan pembandingan antar 2 array)
        $dataA = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
        $dataB = ['A', 'V', 'K', 'G', 'H', 'Z', 'R', 'L', 'Y'];

        $perbandingan1 = collect($dataA)->diff($dataB);
        $perbandingan2 = collect($dataB)->diff($dataA);

        // filter (menyaring nilai)
        $filter = collect($nilai)->filter(function ($value) {
            return $value > 7;
        })->all();

        // plug
        $biodata = [
            ['nama' => 'budi', 'umur' => 17],
            ['nama' => 'ali', 'umur' => 13],
            ['nama' => 'sujono', 'umur' => 18],
            ['nama' => 'windi', 'umur' => 19],
        ];

        $result = collect($biodata)->pluck('umur')->all();


        // map (diguankan untuk melakukan mapping)
        $nilai_x2 = collect($nilai)->map(function ($value) {
            return $value * 2;
        })->all();

        dd($nilai_x2);
    }
}
