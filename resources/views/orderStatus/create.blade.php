<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add an order status</title>
    @include('templates.header')
    <style>
        .form-my{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        .block-my{
            margin-top: 25vh;
            display: flex;
            justify-content: center;
            width: 50vw;
        }
    </style>
</head>
<body>
    @include('templates.adminmenu')

    <div class="form-my">
        <div class="block-my">
            {{ Form::open(array('route'=>'orderstatuses.store')) }}
            <div class="mb-3">
                {{ Form::label('name', 'Name', array('class'=>'form-label')) }}
                {{ Form::text('name', null, array('id' => 'nameInput','class' => 'form-control', 'placeholder' => 'Example: in the cart')); }}
            </div>
            <div class="mb-3">
                {{ Form::label('color', 'Color', array('class'=>'form-label')) }}
                {{ Form::text('color', null, array('id' => 'colorInput','class' => 'form-control', 'placeholder' => 'Example: 005566')); }}
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            {{ Form::close() }}

        </div>
    </div>

    @include('templates.scripts')
</body>
</html>
