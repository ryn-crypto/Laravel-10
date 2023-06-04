@extends('layouts\mainlayout')
@section('title', 'Teachers')

@section('content')
    <div class="m-4">
        <h1 class="text-center">ini adalah halaman Teachers </h1>

        <div class="container m-5">
            <h3>Daftar Guru</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacherList as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>-</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
