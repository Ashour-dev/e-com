@extends('layouts/app')
@section('title',"Add new Product")

@section('content')
    <div class="container">
        <div class="create-container my-3 pt-5">
            <h1 class="text-center">
                Create a new product
            </h1>
            <form class="container-fluid px-5 mt-4" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-2 px-4 product">
                    <div class="col-12">
                        <label for="name">Name*</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ old('name') ?? '' }}" required autocomplete="on" autofocus minlength="5">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                The name
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="brand">Brand*</label>
                        <input class="form-control" type="text" name="brand" id="brand"
                            value="{{ old('brand') ?? '' }}" required autocomplete="on" autofocus minlength="5">
                        @error('brand')
                            <div class="alert alert-danger mt-2">
                                The brand
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="photo">upload the photo:*</label>
                        <input class="form-control" type="file" name="photo" id="photo" required autocomplete="on"
                            autofocus>
                        @error('photo')
                            <div class="alert alert-danger mt-2">
                                the photo
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="description">Description*</label>
                        <textarea class="form-control" name="description" id="description" required autocomplete="on" autofocus minlength="10">{{ old('description') ?? '' }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">
                                Description
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 ">
                        <label for="size">Size:*</label>
                        <input type="text" name="size" id="size" value="{{ old('size') ?? '' }}">
                        @error('size')
                            <div class="alert alert-danger mt-2">
                                Size
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 ">
                        <label for="price">Price:*</label>
                        <input type="number" name="price" id="price" value="{{ old('price') ?? '' }}" required
                            min="1">
                        @error('price')
                            <div class="alert alert-danger mt-2">
                                Il N. di stanze da letto
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="col-12 mt-4">
                        <div class="w-100">
                            <label for="photo[]">More photos</label>
                            <input type="file" class="form-control" name="photos[]" id="photo[]" multiple>
                        </div>
                    </div> --}}

                    <div class="col-12 text-center mt-3">
                        <button class="btn btn-outline-primary" type="submit">send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
