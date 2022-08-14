@extends('layouts\app')
@section('title',"Single Product")

@section('content')

    <div class="w-50 mx-auto text-center">
        @if (str_starts_with($product->photo, 'https://') || str_starts_with($product->photo, 'http://'))
            <img class="w-100 mb-4" src="{{$product['photo']}}" alt="{{$product['photo']}}">
        @else
            <img class="w-100 mb-4" src="{{ asset('/storage') . '/' . $product['photo'] }}" alt="{{$product['name']}}">
        @endif
        <h1>{{$product['brand']}} {{$product['name']}}</h1>
        <p class="w-50 mx-auto">{{$product['description']}}</p>
        <h3>Size Available: {{$product['size']}}</h3>
        <h3>price: {{$product['price']}}</h3>
    </div>
@endsection