<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tastes</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')

    <div class="btn btn-primary"><a href="{{ 'taste/create' }}" class="link-light">Add Taste</a></div>
    @if ($tastes->count() > 0)
    <table class="table table-striped">
        <?php $i = 1; ?>
        @foreach ($tastes as $taste)
            <tr>
                <td>{{$i}}</td>
                <td>{{ $taste->name }}</td>
                <td><img src="<?php
                $image = $taste->image;
                echo asset("/storage/$image->path")?>" alt="<?php echo $taste->image->alt_text
                ?>" width="100px" height="100px"></td>
                <td><a href="{{ route('taste.show', ['taste' => $taste]) }}"><img src="{{ asset('image/icons/eye-fill.svg') }}" alt="Show"></a></td>
                <td><a href="{{ URL::route('taste.edit', ['taste' => $taste]) }}"><img src="{{ asset('image/icons/pencil-fill.svg') }}" alt="Edit"></a></td>
                <td>
                    <?php
                        echo Form::model($taste, array('route' => array('taste.destroy', $taste->id), 'enctype'=>'multipart/form-data', 'name' => 'delete'));
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
    @include("templates.scripts")

</body>
</html>
