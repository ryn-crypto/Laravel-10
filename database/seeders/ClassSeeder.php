<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        // siapkan data untuk di insert ke database
        $data = [
            ['name' => '1 A'],
            ['name' => '1 B'],
            ['name' => '1 C'],
            ['name' => '2 A'],
        ];

        foreach ($data as $d) {
            ClassRoom::insert([
                'name' => $d['name']
            ]);
        }
    }
}
