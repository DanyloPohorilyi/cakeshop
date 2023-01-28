<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')

    <div class="btn btn-primary"><a href="{{ route("category.create") }}" class="link-light">Add Category</a></div>
    @if ($categories->count() > 0)
    <table class="table table-striped">
        <?php $i = 1; ?>
        @foreach ($categories as $category)
            <tr>
                <td>{{$i}}</td>
                <td>{{ $category->name }}</td>
                <td><img src="<?php
                $image = $category->image;
                echo asset("/storage/$image->path")?>" alt="<?php echo $category->image->alt_text
                ?>" width="100px"></td>
                <td><a href="{{ route('category.show', ['category' => $category]) }}"><img src="{{ asset('image/icons/eye-fill.svg') }}" alt="Show"></a></td>
                <td><a href="{{ URL::route('category.edit', ['category' => $category]) }}"><img src="{{ asset('image/icons/pencil-fill.svg') }}" alt="Edit"></a></td>
                <td>
                    <?php
                        echo Form::model($category, array('route' => array('category.destroy', $category->id), 'enctype'=>'multipart/form-data', 'name' => 'delete'));
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
