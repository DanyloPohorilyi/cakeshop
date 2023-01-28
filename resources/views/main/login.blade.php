<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-form.css') }}">
    @include('templates.header')
</head>
<body>
    <div class="my-form">
        <main class="form-signin w-25 m-auto">
            {{ Form::open(array('url' => '/check')) }}
            <form>
              <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

              <div class="form-floating">
                {{ Form::text('login', null, array('class' => 'form-control mb-3', 'id' => 'floatingInput', 'placeholder' => 'example')) }}
                <label for="floatingInput">Login</label>
              </div>
              <div class="form-floating">
                {{ Form::password('password', array('class' => 'form-control', 'id' => 'floatingPassword', 'placeholder' => 'passsword' )) }}
                <label for="floatingPassword">Password</label>
              </div>
              <div class="mb-3">
                <a href="{{ url('/registration') }}" class="btn btn-link">Registration form</a>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
          </main>
    </div>

    @include('templates.scripts')
</body>
</html>
