@extends('layouts.mainlayout')
@section('title', 'Detail Student')

@section('content')
  <div class="m-4">
    <h1 class="text-center">Anda sedang melihat data dari {{ $detail->name }}</h1>

    <div class="my-3">
      @if ($detail->image != '')
        <img src="{{ asset('storage/foto/' . $detail->image) }}" alt="foto" class="rounded mx-auto d-block"
          width="300">
      @else
        <img src="{{ asset('storage/image/foto.jpeg') }}" alt="foto" class="rounded mx-auto d-block" width="300">
      @endif
    </div>

    <div class="container m-5">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nis</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis kelamin</th>
            <th scope="col">Kelas</th>
            <th scope="col">wali Kelas</th>
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
            <th>{{ $detail->class->teacher->name }}</th>
          </tr>
        </tbody>
      </table>
      <table>
        <tr>
          <th>Extrakurikuler yang di ikuti</th>
        </tr>
        <tr>
          @foreach ($detail->extrakurikulers as $item)
            <td>{{ $item->name }}</td>
          @endforeach
        </tr>
      </table>
    </div>
  </div>
@endsection
