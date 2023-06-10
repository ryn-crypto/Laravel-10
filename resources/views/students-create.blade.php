@extends('layouts\mainlayout')
@section('title', 'Tambah data Student')

@section('content')
    <div class="m-4">
        <h1 class="text-center">ini adalah halaman tambah data Student</h1>

        <div class="mt-5 col-6 m-auto">
            <form action="/insert" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nis">Nis</label>
                    <input type="text" class="form-control" name="nis" id="nis" required>
                </div>
                <div class="mb-3">
                    <label for="class">Kelas</label>
                    <select name="class_id" id="class" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        @foreach ($class as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
