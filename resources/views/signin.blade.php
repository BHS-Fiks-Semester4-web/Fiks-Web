<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
            <div class="card-header">
            <h3 class="text-center">Login</h3>
            </div>
            <div class="card-body">
            <form action="/signin" method="post">
                @csrf
                <div class="form-group mb-2">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-custom w-100">Login</button>
                </div>
                <div class="text-center mt-3">
                    <a href="forgot_password" style="text-decoration: none">Forgot Password?</a>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>
