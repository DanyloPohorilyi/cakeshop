<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add a discount</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <?php
    echo Form::open(array('route'=>'discount.store'));

    echo '<div class="mb-3">';
        echo Form::label('percent', 'Percent', array('class'=>'form-label'));
        echo Form::text('percent', 'Example: 5 (means -5%)', array('id' => 'percentInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('confectioneries', 'Confectiorneries', array('class'=>'form-label'));
        echo Form::select('confectioneries[]', $confectioneries, null,  ['class' => 'form-select', 'size' => '5']);
    echo '</div>';

    echo Form::submit('Save', array('class'=>'btn btn-primary'));

    echo Form::close();
    ?>
    @include('templates.scripts')
</body>
</html>
