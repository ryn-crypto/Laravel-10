<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $student = Student::get();
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

    public function update(Request $request, $id)
    {
        // query builder 
        // -------------
        // DB::table('students')->where('id', 27)->update([
        //     'name' => 'sudah di ganti',
        //     'class_id' => 2,
        // ]);

        // elequent 
        // -------------
        // Student::findOrFail(28)->update([
        //     'name' => 'ini juga di ganti',
        //     'class_id' => 1
        // ]);

        // proses update data 
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        // query builder 
        // -------------
        // DB::table('students')->where('id', 27)->delete();

        // elequent 
        // -------------
        // Student::find(28)->delete();

        // hapus data sesuai dengan id yang dikirimkan
        $student = Student::findOrFail($id)->delete();
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'deleted student data success !');
        }

        return redirect('/students');
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

    public function show($id)
    {
        $student = Student::with(['class.teacher', 'extrakurikulers'])
            ->findOrFail($id);
        return view('student-detail', ['detail' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('students-create', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        // $student = new Student;
        // $student-> name = $request->name;
        // $student-> gender = $request->gender;
        // $student-> nis = $request->nis;
        // $student-> class_id = $request->class_id;

        // $student->save();

        // validate form (digunakan pada file studentcreateRequest)
        // $validation = $request->validate([
        //     'nis' => 'unique:students,nis|max:10|required',
        //     'name' => 'required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);

        // =========================
        // menggunakan must asignment
        $student = Student::create($request->all());
        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new student data success !');
        }

        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $classList = ClassRoom::get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'classList' => $classList]);
    }
}
