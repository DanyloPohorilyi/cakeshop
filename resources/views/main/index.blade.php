@extends('layouts.app')

@section('title', 'Home')
<style>
    .bg-images{
        background-image: url('{{ asset('image/backgrounds/close-up-view-of-chocolate-cake-concept-new.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>
@section('page', 'Home')

@section('content')
<main role="main">
    <div class="bg-images">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="">
            <div class="col-md-5 p-lg-5 mx-auto my-5 text-white bg-black bg-opacity-50">
              <h1 class="display-4 font-weight-normal">Delicious pastries</h1>
              <p class="lead font-weight-normal">We bake to order, and also sell at affordable prices. Immerse yourself in the world of various goodies with our bakery!</p>
              <a class="btn btn-outline-light" href="{{ url('/shop') }}">Make an order!</a>
            </div>
            <div class="product-device box-shadow d-none d-md-block"></div>
            <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
          </div>
    </div>

  <div class="container marketing">
    <hr class="featurette-divider">
    <div class="row featurette align-items-center">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="{{ asset('image/backgrounds/flying-donuts-glazed-with-white-chocolate-decorated-with-lyophilized-strawberries-on-red.jpg') }}" data-holder-rendered="true">
      </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette align-items-center">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="{{ asset('image/backgrounds/beautiful-and-delicious-dessert-forest-fruit-and-mint.jpg') }}" data-holder-rendered="true">
      </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette align-items-center">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="{{ asset('image/backgrounds/top-view-of-chocolate-chip-cookies-on-a-baking-pan.jpg') }}" data-holder-rendered="true">
      </div>
    </div>
  </div>
</main>
@endsection
