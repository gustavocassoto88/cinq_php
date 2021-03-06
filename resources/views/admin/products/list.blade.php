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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Products List</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-info" href="/products/create">New Product</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2>Products List</h2>
<table id="products-table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Retailer Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>
                    <img src="/uploads/products/{!! $product->image_path !!}" width="50px" alt="{!! $product->name !!}" title="{!! $product->name !!}" />
                </td>
                <td>{!! $product->name !!}</td>
                <td>{!! $product->price !!}</td>
                <td>{!! $product->retailer->name !!}</td>
                <td>
                    <a href="/products/edit/{!! $product->idproduct !!}" class="btn btn-warning rounded">
                    <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/products/delete/{!! $product->idproduct !!}" class="btn btn-danger rounded">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Retailer Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </tfoot>
</table>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#products-table').DataTable();
    } );
</script>
@endsection