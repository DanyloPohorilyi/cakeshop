<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    @include('templates.header')
    <link rel="stylesheet" href="{{ asset('css/login-form.css') }}">
</head>
<body>
    <div class="my-form">
        <main class="form-signin w-25 m-auto">
            {{ Form::open(array('url' => '/addCustomer')) }}
            <form>
              <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

              <div class="form-floating">
                {{ Form::text('login', null, array('class' => 'form-control mb-3', 'id' => 'floatingInput', 'placeholder' => 'example')) }}
                <label for="floatingInput">Login</label>
              </div>
              <div class="form-floating mb-3">
                {{ Form::password('password', array('class' => 'form-control', 'id' => 'floatingPassword', 'placeholder' => 'passsword' )) }}
                <label for="floatingPassword">Password</label>
              </div>
              <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">First and last name</span>
                    {{ Form::text('firstName', null, array('class' => 'form-control', 'aria-label' => 'First name')) }}
                    {{ Form::text('lastName', null, array('class' => 'form-control', 'aria-label' => 'Last name')) }}
                  </div>
              </div>
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="text" name="phone" class="form-control" id="floatingPhone" placeholder="Address">
                <label for="floatingPhone">Phone</label>
              </div>
              <div class="mb-3">
                <a href="{{ url('/login') }}" class="btn btn-link">Login form</a>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            </form>
          </main>
    </div>
    @include('templates.scripts')
</body>
</html>
