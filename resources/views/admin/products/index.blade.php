@extends('layouts\app')
@section('title','All Products')

@section('content')
<div class="container-fluid">
    <div class="row w-100 justify-content-center">
        <div class="col-11 mx-auto">
            <table class="table w-100 table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">photo</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="products-index-table">
                        <th scope="row">{{$product['id']}}</th>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['brand']}}</td>
                        <td class="overflow-hidden" style="max-width: 10rem;"><img  class="w-100" src="{{$product['photo']}}" alt="{{$product['photo']}}"></td>
                        <td>{{$product['size']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['created_at']}}</td>
                        <td>{{$product['updated_at']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection