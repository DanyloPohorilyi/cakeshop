<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $taste->name }}</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    <div class="card" style="width: 18rem;">
        <img src="<?php
        $image = $taste->image;
        echo asset("/storage/$image->path")?>" class="card-img-top" alt="<?php echo $taste->image->alt_text?>">
        <div class="card-body">
          <h5 class="card-title">{{ $taste->name }}</h5>
          <p class="card-text">{{ $taste->description }}</p>
        </div>
    </div>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('taste.index') }}" style="all: unset">Back</a></button>
    @include('templates.scripts')
</body>
</html>
