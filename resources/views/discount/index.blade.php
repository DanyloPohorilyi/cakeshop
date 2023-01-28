<!DOCTYPE html>
<html lang="en">
<head>
    <title>Discounts</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <div class="btn btn-primary"><a href="{{ route('discount.create') }}" class="link-light">Add a discount</a></div>
    @if ($discounts->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Confectionery</th>
                <th scope="col">Image</th>
                <th scope="col">Old price</th>
                <th scope="col">New price</th>
                <th scope="col">Percent</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        @foreach ($discounts as $discount)
            @foreach ($discount->confectioneries as $confectionery)
            <tr>
                <td>{{$i}}</td>
                <td>{{ $confectionery->name }}</td>
                <td><img src="<?php
                    $image = $confectionery->image;
                    echo asset("/storage/$image->path")?>" alt="<?php echo $confectionery->image->alt_text
                    ?>" width="100px"></td>
                <td>{{ $confectionery->price }} $</td>
                <td>{{ round($confectionery->price * (100 - $discount->percent) / 100 , 2)}} $</td>
                <td>-{{ $discount->percent }}%</td>

                <td><a href="{{ URL::route('discount.edit', ['discount' => $discount]) }}"><img src="{{ asset('image/icons/pencil-fill.svg') }}" alt="Edit"></a></td>
                <td>
                    <?php
                        echo Form::model($discount, array('route' => array('discount.destroy', $discount->id), 'enctype'=>'multipart/form-data', 'name' => 'delete'));
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
        @endforeach
    </table>
    @else
        <p>Empty table!</p>
    @endif
    @include('templates.scripts')
</body>
</html>
