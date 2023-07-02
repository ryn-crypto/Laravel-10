@extends('layouts.mainlayout')
@section('title', 'Tambah data Student')

@section('content')
    <div class="m-4">
        <h1 class="text-center">ini adalah halaman edit data Student</h1>
        <div class="mt-5 col-6 m-auto">
            <form action="/students/update/{{ $student->id }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="{{ $student->gender }}">
                            @if ($student->gender == 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </option>
                        @if ($student->gender == 'L')
                            <option value="P">Perempuan</option>
                        @else
                            <option value="L">Laki-Laki</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nis">Nis</label>
                    <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="class">Kelas</label>
                    <select name="class_id" id="class" class="form-control" required>
                        <option value="{{ $student->class->id }}">{{ $student->class->name }}</option>
                        @foreach ($classList as $item)
                            @if ($item->id != $student->class->id)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Update data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
