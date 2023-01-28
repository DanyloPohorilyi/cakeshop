<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order status</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <div class="btn btn-primary"><a href="{{ route('orderstatuses.create') }}" class="link-light">Add an order status</a></div>
    @if ($orderstatuses->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th scope="col">Example</th>
            </tr>
        </thead>
        @foreach ($orderstatuses as $os)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $os->name }}</td>
                <td>#{{ $os->color }}</td>
                <td><span class="badge" style="background-color: #<?php echo $os->color;?>">{{ $os->name }}</span></td>
                <td><a href="{{ URL::route('orderstatuses.edit', ['orderstatus' => $os]) }}"><img src="{{ asset('image/icons/pencil-fill.svg') }}" alt="Edit"></a></td>
                <td>
                    <?php
                        echo Form::model($os, array('route' => array('orderstatuses.destroy', $os->id), 'enctype'=>'multipart/form-data', 'name' => 'delete'));
                    ?>
                    @method('DELETE')
                    <input type="image" src="{{ asset('image/icons/trash3-fill.svg') }}" alt="Delete" name='submit' id="submit">
                    <?php
                        echo Form::close();
                    ?>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <p>Empty table!</p>
    @endif
    @include('templates.scripts')
</body>
</html>
