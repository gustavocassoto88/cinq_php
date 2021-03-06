@extends('site')
@section('css')
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row product-list">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-3 product-item">
            <div class="product-container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/{!! $product->slug !!}" class="product-image">
                            <img src="/uploads/products/{!! $product->image_path !!}" alt="{!! $product->name !!}" title="{!! $product->name !!}" />
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <h2><a href="/{!! $product->slug !!}">{!! $product->name !!}</a></h2>
                    </div>
                    <div class="col-4">
                        <a href="/retailer/{!! $product->slugR !!}" class="small-text">{!! $product->nameR !!} </a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-12">
                        <p class="product-description">{{ str_limit($product->description, $limit = 150, $end = '...') }} </p>
                        <div class="row">
                            <div class="col-6">
                                <a href="/{!! $product->slug !!}" class="btn btn-light" type="button">Buy Now!</a>
                            </div>
                            <div class="col-6">
                                <p class="product-price">${!! $product->price !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach    
</div>
@endsection
@section('js')
@endsection