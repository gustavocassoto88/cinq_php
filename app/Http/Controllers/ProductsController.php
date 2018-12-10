<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Retailers;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function list(){        

        $products = Products::orderBy("name", "ASC")->get();
        return view('admin/products/list', compact('products'));
    }

    public function create(){

        $retailers = Retailers::whereRaw("status = 1")->get();
        return view('admin/products/create', compact('retailers'));
    }

    public function store(Request $request){
        
    }

    public function edit($id){

        return view('admin/products/edit');
    }

    public function update($id, Request $request){

        
    }

    public function changeStatus($id){

        
    }

    public function delete($id){

       
    }
}
