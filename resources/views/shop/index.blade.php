@extends('layouts.app')

@section('title', 'Shop')

@section('page', 'Shop')

@section('content')
<div class="container px-4 py-5" id="custom-cards">
    @if($categories != null)
    <div class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-5">
        @foreach ($categories as $category)
        <a href="{{ url('/shop/'.urlencode(lcfirst($category->name))) }}" class="text-dark text-decoration-none">
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
            style="background-image: url('<?php $image = $category->image; echo asset("/storage/$image->path")?>'); background-size: cover;  background-position: center;">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold bg-light bg-opacity-10  text-dark ">{{ $category->name }}</h3>

                <ul class="d-flex list-unstyled mt-auto">
                </ul>
              </div>
            </div>
          </div>
        </a>
        @endforeach

    </div>
    @endif

    <div class="border-bottom"></div>
    <div class="row row-cols-2 row-cols-md-4 g-3 mt-2">
        @foreach ($confectioneries as $confectionery)
            <div class="col">
              <div class="card h-100">
                <img class="img-thumbnail" style="" src="<?php
                $image = $confectionery->image;
                echo asset("/storage/$image->path")?>" alt="{{ $confectionery->image->alt_text }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $confectionery->name }}</h5>
                  <h5 class="card-title"><?php
                    $myprice = $confectionery->price;
                    if($confectionery->discounts != null){
                            foreach ($confectionery->discounts as $discount) {
                            $myprice -= round($myprice * $discount->percent / 100, 2);
                        }
                    }

                    echo $myprice;
                ?>$</h5>
                <h6 class="card-subtitle mb-2 text-muted text-decoration-line-through"> <?php
                    if($myprice != $confectionery->price)
                        echo $confectionery->price.'$';
                    else
                        echo '<br>';
                ?> </h6>
                  <a href="{{ url('/shop/'.urlencode(lcfirst($confectionery->category->name)).'/'.$confectionery->id) }}" class="btn btn-outline-secondary">View product</a>
                </div>
              </div>
            </div>

        @endforeach

    </div>
</div>
@endsection
