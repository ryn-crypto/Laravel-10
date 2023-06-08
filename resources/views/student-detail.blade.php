@extends('layouts\mainlayout')
@section('title', 'Detail Student')

@section('content')
    <div class="m-4">
        <h1 class="text-center">Anda sedang melihat data dari {{ $detail->name }}</h1>
        <h5> {{ $detail }} </h5>

        <div class="container m-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $detail->nis }}</th>
                        <th>{{ $detail->name }}</th>
                        <th>
                            @if ($detail->gender == 'L')
                                {{ 'Laki-laki' }}
                            @else
                                {{ 'Perempuan' }}
                            @endif
                        </th>
                        <th>{{ $detail->class->name }}</th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
