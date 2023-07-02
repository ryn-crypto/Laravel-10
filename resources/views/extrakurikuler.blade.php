@extends('layouts.mainlayout')
@section('title', 'Extrakurikuler')

@section('content')
    <div class="m-4">
        <h1 class="text-center">ini adalah halaman Extrakurikuler </h1>

        <div class="container m-5">
            <h3>Daftar Ekskul</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Ekskul</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exkulList as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->name }}</td>
                            <td><a class="btn btn-outline-warning" href="">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
