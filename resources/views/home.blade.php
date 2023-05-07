<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blades</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5">
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

        <hr>
        <h3>penggunaan foreach untuk menampilkan array</h3>

        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buah as $b)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td class="text-capitalize">{{ $b }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
