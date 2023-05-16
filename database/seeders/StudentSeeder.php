<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Student::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'ayu', 'gender' => 'P', 'nis' => '19200356', 'class_id' => '1'],
            ['name' => 'Joko', 'gender' => 'L', 'nis' => '19200666', 'class_id' => '1'],
            ['name' => 'Budi', 'gender' => 'L', 'nis' => '19200866', 'class_id' => '3'],
            ['name' => 'Lusi', 'gender' => 'P', 'nis' => '19200266', 'class_id' => '2'],
            ['name' => 'Ani', 'gender' => 'P', 'nis' => '19200316', 'class_id' => '4']
        ];

        foreach ($data as $d) {
            Student::insert([
                'name' => $d['name'],
                'gender' => $d['gender'],
                'nis' => $d['nis'],
                'class_id' => $d['class_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
