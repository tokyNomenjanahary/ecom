@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <customer-index></customer-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- <i class='bx bx-category'></i>
<i class='bx bx-cog'></i> //setting
<i class='bx bx-trending-up'></i> //up
<i class='bx bx-filter-alt'></i> // filter
<i class='bx bx-buildings'></i> //build
<i class='bx bx-plus-medical'></i> --}}