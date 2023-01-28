<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit {{ $customer->first_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/login-form.css') }}">
    @include('templates.header')
</head>
<body>
@include('templates.adminmenu')
    <div class="my-form">
        <main class="form-signin w-25 m-auto">
            {{ Form::model($customer, array('route' => array('customer.update', $customer->id), 'enctype'=>'multipart/form-data'))}}
            @method('PUT')
            <div class="form-floating">
                {{ Form::text('login', null, array('readonly', 'class' => 'form-control mb-3', 'id' => 'floatingInput', 'placeholder' => 'example')) }}
                <label for="floatingInput">Login</label>
              </div>
              <div class="form-floating mb-3">
                {{ Form::password('password', array('readonly', 'class' => 'form-control', 'id' => 'floatingPassword', 'placeholder' => 'passsword' )) }}
                <label for="floatingPassword">Password</label>
              </div>
              <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">First and last name</span>
                    {{ Form::text('first_name', null, array('class' => 'form-control', 'aria-label' => 'First name')) }}
                    {{ Form::text('last_name', null, array('class' => 'form-control', 'aria-label' => 'Last name')) }}
                  </div>
              </div>
              <div class="form-floating mb-3">
                {{ Form::email('email', null, array('readonly', 'class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'name@example.com')) }}
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                {{ Form::text('phone', null, array('readonly', 'class' => 'form-control', 'id' => 'floatingPhone', 'placeholder' => 'Address')) }}
                <label for="floatingPhone">Phone</label>
              </div>
              <div class="form-check mb-3">
                {{ Form::checkbox('is_admin', null, null, array('id' => 'flexCheckDefault', 'class' => 'form-check-input')) }}
                <label class="form-check-label" for="flexCheckDefault">
                  Is admin?
                </label>
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
              {{ Form::close() }}
          </main>
    </div>
    @include('templates.scripts')
</body>
</html>
