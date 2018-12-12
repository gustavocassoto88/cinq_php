@extends('admin')
@section('css')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
        <i class="fas fa-align-left"></i>
        <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-align-justify"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/products/list">Products List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Edit Product - {!! $product->name !!}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2>Edit product - {!! $product->name !!}</h2>
<form class="needs-validation" novalidate method="post" action="/products/update/{!! $product->idproduct !!}" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormCoimagentrolFile1">Image</label>
        <input type="file" class="form-control-file" id="image" name="image_path">
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" required name="name" value="{!! $product->name !!}">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid name!
            </div>
        </div>
        <div class="col-md-3 mb-6">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Price" required value="{!! $product->price !!}">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid price!
            </div>
        </div>
        <div class="col-md-3 mb-6">
            <label for="retailer">Retailer</label>
            <select class="form-control" id="retailer" name="idretailer" required>
                <option value="">Please select a retailer </option>
                @foreach($retailers as $retailer)
                    @if($product->idretailer == $retailer->idretailer)
                        <option value="{!! $retailer->idretailer !!}" selected>{!! $retailer->name !!}</option>
                    @else
                        <option value="{!! $retailer->idretailer !!}">{!! $retailer->name !!}</option>
                    @endif
                @endforeach
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid retailer!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-12">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description" required value="{!! $product->description !!}"> {!! $product->description !!} </textarea>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid description!
            </div>
        </div>        
    </div>
    <hr/>
    <div class="form-group">
        <div class="form-check">
        @if($product->status == 1)
            <input class="form-check-input" type="checkbox" id="status" checked>
        @else
            <input class="form-check-input" type="checkbox" id="status" >
        @endif
            <label class="form-check-label" for="status">
                Enable Product 
            </label>
            <br/>
            <small> If it is not checked the product will not be shown on the website. </small>            
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-1 mb-12">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </div>
</form>
@endsection
@section('js')
<script>    
    (function() {
      'use strict';
      window.addEventListener('load', function() {        
        var forms = document.getElementsByClassName('needs-validation');        
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>
@endsection