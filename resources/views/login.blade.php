<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- css untuk bootsrtap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Laravel 10 | Login Page</title>
</head>

<body>
  <div class="vh-100">
    <div class="row-8 d-flex justify-content-center">
      @if (Session::has('status'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('message') }}
        </div>
      @endif
    </div>
    <div class="row mx-auto d-flex align-items-center justify-content-center">
      <div class="col-10 col-md-4 d-flex justify-content-center ">
        <img src="{{ asset('storage/image/login.png') }}" class="card-img-top" alt="...">
      </div>
      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="card-body">
          <h5 class="card-title">Login Page</h5>
          <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
              <label for="emailid" class="form-label">Email address</label>
              <input type="email" class="form-control" id="emailid" placeholder="mail@mail.com" name="email"
                required>
            </div>
            <div class="mb-3">
              <label for="passwordid" class="form-label">Password</label>
              <input type="password" class="form-control" id="passwordid" name="password" required>
            </div>
            <div class="mb3">
              <button type="submit" class="btn btn-success form-control">Login </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
