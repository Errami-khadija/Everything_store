@extends('layouts.store')
@section('content')

    <div class="store mt-5 pt-5">
        <div class="container mt-4">
            <div class="d-flex justify-content-start align-items-center gap-3">
                <h1 class="heading-1">store</h1>
                <h1 class="heading-1 mx-4">|</h1>
                <div class="d-flex align-items-center categories gap-8 filters">
                    <a href="#" class="active" data-filter="*">All</a>
                   @foreach ($categories as $category)
                        <a href="#" data-filter=".{{ $category->slug }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section class="section my-4 py-4">
        <div class="container d-flex flex-column gap-64">
            <div class="row justify-content-center align-items-center g-4 products-row">
                @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-12 {{ $product->category->slug }}">
            <div class="bg-box d-flex flex-column gap-16 position-relative b-radius">

                <img src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="{{ $product->name }}">

                <div class="d-flex flex-column padding-16">
                    <a href="{{ route('product.show', $product->id) }}">
                        <h3 class="heading-4">{{ $product->name }}</h3>
                    </a>

                    <p class="body-2">
                        {{ Str::limit($product->description, 60) }}
                    </p>

                    <h3 class="heading-3 my-2">
                        ${{ number_format($product->price, 2) }}
                    </h3>
                     <button class="btn add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors"
                             data-id="{{ $product->id }}">
                                Add to Cart
                            </button>
                </div>
               

            </div>
        </div>
    @endforeach
            </div>
        </div>
    </section>


   @include('components.store.cta')

    @endsection