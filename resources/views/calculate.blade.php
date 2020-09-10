
<!-- Extends Calculator App -->
@extends('form')

<!-- Calculated Section -->
@section('calculate-content')

    <div class="row pl-5 pr-5">
        <div class="col">
        </div>
        <div class="col-6 bg-light text-center message form-box">
        <p class="m-2"> {{ $carbonFootprint }} kg</p>
        </div>
        <div class="col">
        </div>
    </div>

@endsection