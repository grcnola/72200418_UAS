<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""> 
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">\
    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.2/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin w-100 m-auto">
    <form action="/user/checkLogin" method="POST">
        
    @csrf
        <h1 class="h3 mb-3 fw-normal">Silahkan Melakukan Login</h1><br>
        <div class="form-floating">
          @if(session('alertLogout'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{session('alertLogout')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
          @endif
        </div>
        <div class="form-floating">
            <input type="number" name="no_hp" class="form-control" id="floatingInput" placeholder="No HP" autofocus>
            <label for="floatingInput">No HP</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password"  class="form-control" id="floatingPassword" placeholder="password">
            <label for="floatingPassword">Password</label>
        </div>
    <br>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">72200418 - Grace Nolanda</p>
    </form>
    </main>
  </body>
</html>