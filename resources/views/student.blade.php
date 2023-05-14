@extends('layouts\mainlayout')
@section('title', 'Students')

@section('content')
    <div class="m-4">
        <h1 class="text-center">ini adalah halaman Student </h1>

        <div class="container m-5">
            <h3>Daftar siswa</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentList as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                @if ($data->gender == 'L')
                                    {{ 'Laki-laki' }}
                                @else
                                    {{ 'Perempuan' }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
