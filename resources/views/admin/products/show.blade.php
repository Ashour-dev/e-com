@extends('layouts\app')
@section('title',"Single Product")

@section('content')

    <div class="w-50 mx-auto text-center">
        <img class="w-100 mb-4" src="{{$product['photo']}}" alt="{{$product['photo']}}">
        <h1>{{$product['brand']}} {{$product['name']}}</h1>
        <h3>Size Available: {{$product['size']}}</h3>
        <h3>price: {{$product['price']}}</h3>
    </div>

@endsection