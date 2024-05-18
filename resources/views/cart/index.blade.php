@extends('layouts.app')

@section('content')
  @if(session('message'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
  @endif
  <div class="container">
    <shopping-cart></shopping-cart>
  </div>
@endsection