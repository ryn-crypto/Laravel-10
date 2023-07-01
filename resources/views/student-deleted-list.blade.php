@extends('layouts\mainlayout')
@section('title', 'Students deleted data')

@section('content')
    <div class="m-4">
        <h1 class="text-center">ini adalah halaman data Student yang sudah di hapus</h1>
        <div class="container m-5">
            @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <h3>Daftar siswa</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deletedStudent as $data)
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
                            <td>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-id="{{ $data->id }}" data-bs-name="{{ $data->name }}"
                                    data-bs-target="#restoreModals">
                                    Restore
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="restoreModals" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin Mengembalikan data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="get">
                        @csrf
                        <a href="" id="delete" type="submit" class="btn btn-danger">Ya, Kembalikan Data</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // restore modals
        var restoreModals = document.querySelector('#restoreModals');
        restoreModals.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget

            var iddelete = button.getAttribute('data-bs-id');
            var namedelete = button.getAttribute('data-bs-name');

            var formdelete = document.getElementById('delete')
            var modalTitle = restoreModals.querySelector('.modal-title')

            modalTitle.textContent = 'Kembalikan data ' + namedelete
            formdelete.setAttribute("href", '/students/' + iddelete + '/restore');
        })
    </script>
@endsection
