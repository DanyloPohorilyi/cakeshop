<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Taste</title>
    @include("templates.header")
</head>
<body>
    @include('templates.adminmenu')
    <?php
    echo Form::open(array('route'=>'taste.store', 'files'=>true));

    echo '<div class="mb-3">';
        echo Form::label('name', 'Name', array('class'=>'form-label'));
        echo Form::text('name', null, array('id' => 'nameInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('description', 'Description', array('class'=>'form-label'));
        echo Form::textarea('description', null, array('rows' => '3', 'id' => 'descriptionInut', 'class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('imageInput', 'Image', array('class'=>'form-label'));
        echo Form::file('image', $attributes = array('id'=>'imageInput', 'class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('altInput', 'Alternative text for image', array('class'=>'form-label'));
        echo Form::text('alt_text', null, array('id' => 'altInput','class' => 'form-control'));
    echo '</div>';

    echo Form::submit('Save', array('class'=>'btn btn-primary'));

    echo Form::close();
    ?>
    @include('templates.scripts')
</body>
</html>
