@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  @foreach ($products as $product)
  <div class="card custom-card m-2 p-0">
    {{-- <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->image_url }}"> --}}
    <img src="{{ asset('img/car.jpeg')}}" class="card-img-top custom-card-img  rounded-0">
    <div class="card-body row flex-column">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text">
        {{ $product->description }}
      </p>
      <div class="row align-items-center mt-auto mx-0 px-0">
        <strong class="text-muted col"> ${{ $product->price }}</strong>
        <add-to-cart :product-id = {{ $product->id }}></add-to-cart>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection