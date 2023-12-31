<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      html,
     body {
       height: 100%;
     }
 
     body {
       display: flex;
       align-items: center;
       padding-top: 40px;
       padding-bottom: 40px;
       background-color: #f5f5f5;
     }
 
     .form-signin {
       max-width: 330px;
       padding: 15px;
     }
 
     .form-signin .form-floating:focus-within {
       z-index: 2;
     }
 
     .form-signin input[type="email"] {
       margin-bottom: -1px;
       border-bottom-right-radius: 0;
       border-bottom-left-radius: 0;
     }
 
     .form-signin input[type="password"] {
       margin-bottom: 10px;
       border-top-left-radius: 0;
       border-top-right-radius: 0;
     }
     </style>
  </head>
  <body class="text-center"> 
<main main class="form-signin w-100 m-auto">
    <form action="{{ route('register') }}" method="POST">
    @csrf
    @method('POST')
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
        <label for="floatingInput">Name</label>
        <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-floating">
        <label for="floatingEmail">Email address</label>
        <input type="email" name="email" id="floatingEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-floating">
        <label for="floatingPassword">Password</label>
        <input type="password" name="password" id="floatingPassword" required class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="checkbox mb-3">
      <label>
        <a href="{{ route('login') }}">Sign in?</a>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; Produksi-Barang 2023</p>
  </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
