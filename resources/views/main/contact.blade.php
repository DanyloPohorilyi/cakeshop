@extends('layouts.app')

@section('title', 'Contacts')
<style>
    .myblock{
        display: flex;
        margin: 15.1vh 15vw;
    }
</style>
@section('page', 'Contacts')

@section('content')
<main role="main">
<div class="section px-5">
    <div class="container marketing">
        <div class="myblock">


        <!-- Three columns of text below the carousel -->
        <div class="row text-center">
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('image/backgrounds/adorable-pug-puppy-solo-portrait.jpg') }}" style="object-fit: cover" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('image/backgrounds/front-view-of-smiley-man-with-sunglasses-in-the-city.jpg') }}" style="object-fit: cover" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('image/backgrounds/portrait-beautiful-woman-with-phone.jpg') }}" style="object-fit: cover" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <hr class="featurette-divider">
      </div>
    </div>
  </div>
</main>
@endsection
