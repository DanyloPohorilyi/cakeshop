<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="icon" type="image/*" href="{{ asset('image/icons/cake.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>

        <?php
            $page = View::getSection('page', 'Home')
        ?>
        @include('templates.menu', ['page' => $page])

    @yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="{{ url('/shop') }}" class="nav-link px-2 text-muted">Shop</a></li>
        <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link px-2 text-muted">About</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link px-2 text-muted">Contacts</a></li>
      </ul>
      <p class="text-center text-muted">© 2023 Cake Shop, Inc</p>
    </footer>
  </div>
{{--<footer class="footer bg-dark mt-5" style="height: 10vh; ">
    <div class="container ">
     <spanclass="text-white">Placestickyfootercontenthere.</span>
    </div>
  </footer>
}}
  {{-- Position Absolute --}}
  {{-- <footer class="footer bg-dark mt-5" style="height: 10vh; position:absolute; bottom:0; width: 100%">
    <div class="container ">
      <spanclass="text-white">Placestickyfootercontenthere.</span>
    </div>
  </footer> --}}
</html>
