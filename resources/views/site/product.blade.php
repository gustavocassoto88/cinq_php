@extends('site')
@section('css')
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <h1 class="my-4">{!! $product->name !!}<br /></h1>
        <div class="row">
            <div class="col-md-8"><img class="img-fluid" src="/uploads/products/{!! $product->image_path !!}" alt="{!! $product->name !!}" title="{!! $product->name !!}" /></div>
            <div class="col-md-4">
                <h3 class="my-3">Product Description</h3>
                <p>{!! $product->description !!}</p>
                <h3 class="my-3">Product Details</h3>
                <ul class="list-unstyled">
                    <li>U$ {!! $product->price !!}</li>
                    <li>Retailer - 
                        <a  href="/retailer/{!! $product->retailer->slug !!}">{!! $product->retailer->name !!}</a>
                    </li>                    
                </ul>
                <form name="mail-product" action="/send-product/{!! $product->slug !!}" method="POST">
                    <p> Tell to your friends about this product, just type their e-mail at this form and send it to them! </p>
                    <input type="email" name="email"  class="form-control" placeholder="Type your friend E-mail" required />                   
                    <input type="submit" value="Send to a friend" class="btn btn-success send-mail" />
                </form> 
            </div>
        </div>
        @if(count($othersProducts) > 0)
            <h3 class="my-4">See more products of {!! $product->retailer->name !!}<br /></h3>
            <div class="row">          
                @foreach($othersProducts as $prod)  
                    <div class="col-sm-6 col-md-3 mb-4">
                        <a href="/{!! $prod->slug !!}">
                            <img class="img-fluid" src="/uploads/products/{!! $prod->image_path !!}" alt="{!! $prod->name !!}" title="{!! $prod->name !!}" width="100px"/>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
@section('js')
@endsection