<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confectioneries</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <div class="btn btn-primary"><a href="{{ route("confectionery.create") }}" class="link-light">Add Confectionery</a></div>
    @if ($confectioneries->count() > 0)
    <table class="table table-striped">
        <?php $i = 1; ?>
        @foreach ($confectioneries as $confectionery)
            <tr>
                <td>{{$i}}</td>
                <td>{{ $confectionery->name }}</td>
                <td>{{ $confectionery->price }} $</td>
                <td><img src="<?php
                $image = $confectionery->image;
                echo asset("/storage/$image->path")?>" alt="<?php echo $confectionery->image->alt_text
                ?>" width="100px"></td>
                <td><a href="{{ route('confectionery.show', ['confectionery' => $confectionery]) }}"><img src="{{ asset('image/icons/eye-fill.svg') }}" alt="Show"></a></td>
                <td><a href="{{ URL::route('confectionery.edit', ['confectionery' => $confectionery]) }}"><img src="{{ asset('image/icons/pencil-fill.svg') }}" alt="Edit"></a></td>
                <td>
                    <?php
                        echo Form::model($confectionery, array('route' => array('confectionery.destroy', $confectionery->id), 'enctype'=>'multipart/form-data', 'name' => 'delete'));
                    ?>
                    @method('DELETE')
                    <input type="image" src="{{ asset('image/icons/trash3-fill.svg') }}" alt="Delete" name='submit' id="submit">
                    <?php
                     echo Form::close();
                    ?>
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach
    </table>
    @else
        <p>Empty table!</p>
    @endif
    @include('templates.scripts')
</body>
</html>
