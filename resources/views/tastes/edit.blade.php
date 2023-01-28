<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit {{  $taste->name }}</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <?php
    echo Form::model($taste, array('route' => array('taste.update', $taste->id), 'enctype'=>'multipart/form-data'));
    ?>
    @method('PUT')
    <?php
    echo '<div class="mb-3">';
        echo Form::label('name', 'Name', array('class'=>'form-label'));
        echo Form::text('name', null, array('id' => 'nameInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('description', 'Description', array('class'=>'form-label'));
        echo Form::textarea('description', null, array('rows' => '3', 'id' => 'descriptionInut', 'class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        ?>
            <img src="<?php
            $image = $taste->image;
            echo asset("/storage/$image->path")?>" alt="<?php echo $taste->image->alt_text
            ?>" width="100px" height="100px">
        <?php
        echo Form::file('image', $attributes = array('id'=>'imageInput', 'class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('altInput', 'Alternative text for image', array('class'=>'form-label'));
        echo Form::text('alt_text', $taste->image->alt_text, array('id' => 'altInput','class' => 'form-control'));
    echo '</div>';

    echo Form::submit('Update', array('class'=>'btn btn-primary'));

    echo Form::close();
    ?>
    @include('templates.scripts')
</body>
</html>
