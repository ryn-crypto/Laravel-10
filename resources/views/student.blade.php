@extends('layouts.mainlayout')
@section('title', 'Students')

@section('content')
  <div class="m-4">
    <h1 class="text-center">ini adalah halaman Student </h1>

    <div class="d-flex justify-content-between container mt-3">
      <a href="students/add" class="btn btn-outline-primary">Add data</a>
      <a href="students/deleted" class="btn btn-outline-warning">Data List Student Deleted</a>
    </div>
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
              <td><a class="btn btn-outline-info" href="students/{{ $data->id }}">Detail</a>
                <a class="btn btn-outline-warning" href="students/edit/{{ $data->id }}">Edit</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                  data-bs-id="{{ $data->id }}" data-bs-name="{{ $data->name }}" data-bs-target="#exampleModal">
                  delete
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="my-5">
        {{ $studentList->links() }}
      </div>
    </div>
  </div>
  <div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus data ini ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form method="get">
            @csrf
            <a href="" id="delete" type="submit" class="btn btn-danger">Hapus data</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    // deleted modals
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget

      var iddelete = button.getAttribute('data-bs-id');
      var namedelete = button.getAttribute('data-bs-name');

      var formdelete = document.getElementById('delete')
      var modalTitle = exampleModal.querySelector('.modal-title')

      modalTitle.textContent = 'Hapus data ' + namedelete
      formdelete.setAttribute("href", '/students/delete/' + iddelete)
    })
  </script>
@endsection
