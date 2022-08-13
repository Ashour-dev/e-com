@extends('layouts\app')
@section('title',"Single Product")

@section('content')

    <img class="w-50" src="{{$product['photo']}}" alt="{{$product['photo']}}">
    <h1>{{$product['brand']}} {{$product['name']}}</h1>
    <h3>Size Available: {{$product['size']}}</h3>
    <h3>price: {{$product['price']}}</h3>

@endsection