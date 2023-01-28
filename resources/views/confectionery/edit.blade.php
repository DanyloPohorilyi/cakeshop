<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Confectionery</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <?php
    echo Form::model($confectionery, array('route' => array('confectionery.update', $confectionery->id), 'enctype'=>'multipart/form-data'));
    ?>
    @method('PUT')
    <?php
    echo '<div class="mb-3">';
        echo Form::label('name', 'Name', array('class'=>'form-label'));
        echo Form::text('name', null, array('id' => 'nameInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('price', 'Price', array('class'=>'form-label'));
        echo Form::text('price', null, array('id' => 'priceInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="row g-3">';
    echo '<div class="col">';
        echo Form::label('calories', 'Calories (in kcals)', array('class'=>'form-label'));
        echo Form::text('calories', null, array('id' => 'caloriesInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="col">';
        echo Form::label('fats', 'Fats (in g)', array('class'=>'form-label'));
        echo Form::text('fats', null, array('id' => 'fatsInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="col">';
        echo Form::label('proteins', 'Proteins (in g)', array('class'=>'form-label'));
        echo Form::text('proteins', null, array('id' => 'proteinsInput','class' => 'form-control'));
    echo '</div>';
    echo '</div>';

    echo '<div class="row g-3">';
        echo '<div class="col">';
        echo Form::label('carbohydrates', 'Carbohydrates (in g)', array('class'=>'form-label'));
        echo Form::text('carbohydrates', null, array('id' => 'carbohydratesInput','class' => 'form-control'));
        echo '</div>';

        echo '<div class="col">';
        echo Form::label('preparing_time', 'Preparing time (in min)', array('class'=>'form-label'));
        echo Form::text('preparing_time', null, array('id' => 'preparingTimeInput','class' => 'form-control'));
        echo '</div>';
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('category', 'Category', array('class'=>'form-label'));
        echo Form::select('category', $categories, null,  ['class' => 'form-select']);
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('tastes', 'Tastes', array('class'=>'form-label'));
        echo Form::select('tastes[]', $tastes, null,  ['class' => 'form-select', 'multiple' => '', 'size' => '2']);
    echo '</div>';

    echo '<div class="mb-3">';
        ?>
        <img src="<?php
            $image = $confectionery->image;
            echo asset("/storage/$image->path")?>" alt="<?php echo $confectionery->image->alt_text
            ?>" >
            <?php
        echo Form::file('image', $attributes = array('id'=>'imageInput', 'class' => 'form-control', 'accept' => 'image/*'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('altInput', 'Alternative text for image', array('class'=>'form-label'));
        echo Form::text('alt_text', $confectionery->image->alt_text, array('id' => 'altInput','class' => 'form-control'));
    echo '</div>';

    echo '<div class="mb-3">';
        echo Form::label('description', 'Description', array('class'=>'form-label'));
        echo Form::textarea('description', null, array('id' => 'descriptionInput','class' => 'form-control'));
    echo '</div>';

    echo Form::submit('Save', array('class'=>'btn btn-primary'));

    echo Form::close();
    ?>

    @include('templates.scripts')
</body>
</html>
