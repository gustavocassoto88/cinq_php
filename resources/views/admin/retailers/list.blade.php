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
                    <a class="nav-link" href="#">Retailers List</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-info" href="/retailers/create">New Retailer</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2>Retailers List</h2>
<table id="retailer-table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Logo</th>
            <th>Name</th>
            <th>WebSite</th>            
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($retailers as $key => $retailer)
            <tr>
                <td>
                    <img src="/uploads/retailers/{!! $retailer->image_path !!}" width="50px" alt="{!! $retailer->name !!}" title="{!! $retailer->name !!}" />
                </td>
                <td>{!! $retailer->name !!}</td>
                <td>
                    <a href="{!! $retailer->website !!}" target="_blank">{!! $retailer->name !!} Website </td>                
                <td>
                    <a href="/retailers/edit/{!! $retailer->idretailer !!}" class="btn btn-warning rounded">
                    <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/retailers/delete/{!! $retailer->idretailer !!}" class="btn btn-danger rounded">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Logo</th>
            <th>Name</th>
            <th>WebSite</th>            
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
        $('#retailer-table').DataTable();
    } );
</script>
@endsection