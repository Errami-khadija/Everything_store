@extends('layouts.store')

@section('content') 

    <!-- ============== start product section ========== -->

    <section class="section product">
        <div class="container">
            <div class="d-flex flex-column gap-32">
                <p class="body-1">Store > {{ $product->category->name }} > <span class="primary-text fw-bold">{{ $product->name }}</span></p>
                <div class="row g-4 justify-content-center align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="d-flex flex-column gap-16">
                             <img src="{{ asset('uploads/products/' . $product->images[0]) }}">
                            <div class="row g-3">
                                @foreach($product->images as $image)
                                    <div class="img col-3 b-radius">
                                        <img src="{{ asset('uploads/products/' . $image) }}" alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="d-flex flex-column gap-16">
                            <div class="d-flex flex-column">
                                <h6 class="heading-4 m-0 p-0">{{ $product->name }}</h6>
                                <p class="body-2">{{ $product->description }}</p>
                                <hr>
                            </div>
                            <div class="d-flex flex-column gap-16">
                                <h2 class="heading-2">${{ number_format($product->price, 2) }}</h2>
                                <div class="d-flex gap-8">
                                    
                                    <button class="btn add-to-cart"  data-id="{{ $product->id }}">Add to cart</button>
                                </div>
                                <hr>
                            </div>
                            <div class="d-flex flex-column gap-8">
                                 @if(!empty($product->specifications))
        @foreach($product->specifications as $spec)
            <div class="d-flex justify-content-start gap-16">
                <i class="fa-solid fa-check icon-sm primary-text"></i>
                <p class="body-1">{{ $spec['name']}} : {{ $spec['value'] }}</p>
            </div>
        @endforeach
    @else
        <p class="text-muted">No specifications available.</p>
    @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============== start related products section ========== -->
     <section class="bestsellers section position-relative pt-4 mt-4" id="bestsellers">
    <div class="container d-flex flex-column gap-64">
      <div class="heading row justify-content-between align-items-start g-4">
        <div class="d-flex flex-column align-items-start justify-content-start gap-8 col-lg-6 col-12">
          <h1 class="heading-1">Related Products</h1>
          <p class="body-1">browse favorite sale styles and brands</p>
        </div>
        <div class="col-lg-6 col-12 d-flex justify-content-lg-end justify-content-start">
          <a href="{{ route('store') }}" class="learn-more">Browse All Products <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="row g-4">
          @foreach($relatedProducts as $product)
        <div class="col-lg-3 col-md-6 col-12">
          <div class="bg-box d-flex flex-column gap-16 position-relative b-radius">
            <h4 class="category">{{ $product->category->name ?? 'No Category' }}</h4>
            <img class="product-img" src="{{ asset('uploads/products/' . $product->images[0]) }}" alt="product">
            <div class="d-flex flex-row justify-content-between padding-16">
              <a href="{{ route('product.show', $product->id) }}">
                <h3 class="heading-4">{{ $product->name }}</h3>
              </a>
              <h3 class="heading-3 ">${{ number_format($product->price, 2) }}</h3>
            </div>
          <button class="btn add-to-cart-btn px-4 py-2 rounded-lg font-medium transition-colors"
                             data-id="{{ $product->id }}">
                                Add to Cart
                            </button>
            
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

    <!-- ============== End related products section ========== -->


@include('components.store.testimonials')

  @include('components.store.cta')


@endsection