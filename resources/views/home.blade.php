@extends('layouts.mainlayout')
@section('title', 'Home')

@section('content')
  <div class="m-4">
    <h1>ini adalah halaman home </h1>
    <h4>halaman ini dibuat oleh Riyan first tiyanto</h4>
    <h2 class="mt-5">Selamat datang , {{ Auth::user()->name }}. Saat ini anda adalah, {{ Auth::user()->role->name }}
    </h2>
    <hr>
  @endsection
