@extends('layouts.app')

@section('title', $confectionery->name)
<style>
    .block-my{
        display: none;
        position: fixed;
        align-items: center;
        z-index: 1;
        left: 0;
        top: 0;
        overflow: auto;
        width: 100%;
        height: 100%;
        justify-content: center;
        background-color: rgba(0,0,0,0.4);
    }
    .modal-my{
        width: 30vw;
    }
</style>

@section('page', 'Shop')

@section('content')
{{ Form::open(array('url'=>'/shop/'.urlencode(lcfirst($confectionery->category->name)).'/'.$confectionery->id, 'method' => 'post', 'name' => 'form')); }}
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php
                $image = $confectionery->image;
                echo asset("/storage/$image->path")?>" alt="<?php echo $confectionery->image->alt_text?>" /></div>
            <div class="col-md-6">
                <div class="small mb-1">Category: <a href="{{ url('/shop/'.urlencode(lcfirst($confectionery->category->name))) }}">{{ $confectionery->category->name }}</a></div>
                <h1 class="display-5 fw-bolder">{{ $confectionery->name }}</h1>
                <div class="fs-5 mb-3">
                    <span class="text-decoration-line-through">
                        <?php $myprice = $confectionery->price;
                        if($confectionery->discounts != null){
                            foreach ($confectionery->discounts as $discount) {
                                $myprice -= round($myprice * $discount->percent / 100, 2);
                            }
                        }
                        if($myprice != $confectionery->price)
                                    echo '$'.$confectionery->price;?>
                    </span>
                    <span>
                        $<?php echo $myprice;?>
                    </span>




                </div>
                <div class="taste mb-5">
                    <h6>Tastes:</h5>
                    @foreach ($confectionery->tastes as $taste)
                        {{ Form::radio('taste', $taste->name, false, array('class' => 'btn-check', 'id' => 'option'.$loop->iteration, 'autocomplete'=>"off")) }}
                        <label class="btn btn-outline-secondary" for="{{ 'option'.$loop->iteration }}">{{ $taste->name }}</label>
                    @endforeach
                </div>
                <p class="mb-3">
                    <strong>Calories:</strong> {{ $confectionery->calories }}kcal<br>
                    <strong>Proteins:</strong> {{ $confectionery->proteins }}g<br>
                    <strong>Fats:</strong> {{ $confectionery->fats }}g<br>
                    <strong>Carbohydrates:</strong> {{ $confectionery->carbohydrates }}g<br>
                    <strong>Preparing time:</strong> {{ $confectionery->preparing_time }} min<br>
                </p>
                <p class="lead">{{ $confectionery->description }}</p>
                <div class="d-flex">
                    {{ Form::text('count', 1, array('id'=>"inputQuantity", 'class' => "form-control text-center me-3", 'type' => 'num', 'style' => 'max-width: 3rem')) }}
                    {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> --}}
                    <button class="btn btn-outline-dark flex-shrink-0" type="button" id="orderBtn">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>


        </div>
        <div class="block-my" id="myModal">
            <div class="modal-my">
                <div class="modal-content rounded-4 shadow bg-light">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                      <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                      <h1 class="fw-bold mb-0 fs-2">Additional info</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <div class="form-floating mb-3">
                            {{ Form::text('address', null, array('class' => 'form-control rounded-3', 'id' => 'floatingInput', 'placeholder' => 'Kyiv, Khreshchatyk 12 B')) }}
                          <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            {{ Form::text('phone', null, array('class' => 'form-control rounded-3', 'id' => 'floatingPhone', 'placeholder' => '+38 (000) 00-00-000')) }}
                          <label for="floatingPhone">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            {{ Form::textarea('add_info', null, array('class' => 'form-control rounded-3', 'id' => 'floatingDescription', 'placeholder' => 'Add something...', 'style' => 'height: 20vh')) }}
                          <label for="floatingDescription">Your wishes</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary" type="submit">Order</button>
                        <small class="text-muted">By clicking Order, you agree to the terms of use.</small>
                    </div>
                  </div>
            </div>
        </div>

    </div>
</section>
{{ Form::close(); }}
<script>
    var modal = document.getElementById("myModal");

    var btn = document.getElementById("orderBtn");

    var span = document.getElementsByClassName("btn-close")[0];

    btn.onclick = function() {
        var inputText =  document.forms["form"]["count"].value;
        var inputRadio = document.querySelector('input[name = "taste"]:checked');
        if(inputRadio != null && inputText != null && inputText != "" ){
            modal.style.display = "flex";

        }
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
@endsection
