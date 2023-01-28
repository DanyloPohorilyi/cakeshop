<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $confectionery->name }}</title>
    @include('templates.header')
    <link rel="stylesheet" href="{{ asset('css/confectioery_show.css') }}">
</head>
<body>
    @include('templates.adminmenu')
    <div class="content">
        <div class="top">
            <img src="<?php
            $image = $confectionery->image;
            echo asset("/storage/$image->path")?>" alt="<?php echo $confectionery->image->alt_text
            ?>">
            <div class="info">
                <h1>{{ $confectionery->name }}</h1>
                <h2>{{ $confectionery->price }} $</h2>
                <div class="tastes">
                    @foreach ($confectionery->tastes as $taste)
                    <div class="taste">
                        <img src="<?php
                        $image = $taste->image;
                        echo asset("/storage/$image->path")?>" alt="<?php echo $taste->image->alt_text
                        ?>">
                        <button>{{ $taste->name  }}</button>
                    </div>
                    @endforeach


                </div>
                <div class="btn btn-primary " style="margin-top: 2vh; width: 10vw; font-weight: bold;">Buy</div>
                <div class="block">
                    <div class="attr">Calories
                        <span>.......................................</span>
                        {{ $confectionery->calories }} kcal</div>
                    <div class="attr">Fats
                        <span>.......................................</span>
                        {{ $confectionery->fats }} g</div>
                    <div class="attr">Proteins
                        <span>.......................................</span>
                        {{ $confectionery->proteins }} g</div>
                    <div class="attr">Carbohydrates
                        <span>.......................................</span>
                        {{ $confectionery->carbohydrates }} g</div>
                <div class="attrLast">Preparing time
                    <span>.......................................</span>
                    {{ $confectionery->preparing_time }} min</div>
                </div>
            </div>
        </div>
        <div class="description">
            {{ $confectionery->description }}
        </div>
    </div>
    @include('templates.scripts')
</body>
</html>
