@extends('layouts\mainlayout')
@section('title', 'Home')

@section('content')
    <div class="m-4">
        <h1>ini adalah halaman home </h1>
        <h4>halaman ini dibuat oleh, {{ $name }}</h4>
        <h4>anda saat ini adalah, {{ $role }} </h4>
        <hr>

        {{-- ini untuk if statement --}}
        {{-- @if ($role == 'admin')
            <a class="btn btn-outline-danger" href="">ke halaman admin</a>
        @else
            <a class="btn btn-outline-danger" href="">ke halaman gudang</a>
        @endif --}}

        {{-- untuk penggunaan switch --}}
        @switch($role)
            @case('admin')
                <a class="btn btn-outline-danger" href="">ke halaman admin</a>
            @break

            @case('staff')
                <a class="btn btn-outline-danger" href="">ke halaman gudang</a>
            @break

            @default
                <a class="btn btn-outline-danger" href="">Hubungi admin</a>
        @endswitch
    </div>
@endsection
