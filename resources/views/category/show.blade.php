<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit {{ $category->name }}</title>
    @include('templates.header')
    <style>
        .section{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    @include('templates.adminmenu')
    <div class="section">
        <div class="card" style="width: 18rem;">
            <img src="<?php
            $image = $category->image;
            echo asset("/storage/$image->path")?>" class="card-img-top" alt="<?php echo $category->image->alt_text?>">
            <div class="card-body">
              <h5 class="card-title">{{ $category->name }}</h5>
            </div>
          </div>
          <button type="button" class="btn btn-primary"><a href="{{ route('category.index') }}" style="all: unset">Back</a> </button>
    </div>

    @include('templates.scripts')
</body>
</html>
