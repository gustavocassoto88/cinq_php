<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Retailers;
use Redirect;
use Session;
use Image;

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
    
    public function create()
    {
        
        $retailers = Retailers::whereRaw("status = 1")->get();
        return view('admin/products/create', compact('retailers'));
    }
    
    public function store(Request $request)
    {
        
        $data = $request->all();
        
        if (Input::file('image_path')) {
            $image    = Input::file('image_path');
            $filename = md5($_FILES['image_path']['name']) . '.' . $image->getClientOriginalExtension();
            $path     = public_path() . '/uploads/products/' . $filename;
            Image::make($image->getRealPath())->save($path);
            $data['image_path'] = $filename;
        }
        
        $data['created_at'] = date("Y-m-d H:i:s");
        
        if (isset($data['status']))
            $data['status'] = 1;
        
        try {
            Products::create($data);
            Session::flash('success', 'The product was created.');
        }
        catch (Exception $e) {
            Session::flash('error', 'Opps, there is some problem with this requisition, please try again soon or let us know');
        }
        
        return Redirect::back();
    }
    
    public function edit($id)
    {
        $product   = Products::find($id);
        $retailers = Retailers::whereRaw("status = 1")->get();
        return view('admin/products/edit', compact('product', 'retailers'));
    }
    
    public function update($id, Request $request)
    {
        $product = Products::find($id);
        $data    = $request->all();
        
        $product->updated_at  = date("Y-m-d H:i:s");
        $product->description = $data['description'];
        $product->idretailer  = $data['idretailer'];
        $product->price       = $data['price'];
        $product->name        = $data['name'];
        
        if (Input::file('image_path')) {
            $image    = Input::file('image_path');
            $filename = md5($_FILES['image_path']['name']) . '.' . $image->getClientOriginalExtension();
            $path     = public_path() . '/uploads/products/' . $filename;
            Image::make($image->getRealPath())->save($path);
            $product->image_path = $filename;
        }
        
        if (isset($data['status']))
            $product->status = 1;
        
        try {
            $product->save();
            Session::flash('success', 'The product was updated');
        }
        catch (Exception $e) {
            Session::flash('error', 'Opps, there is some problem with this requisition, please try again soon or let us know');
        }
        
        return Redirect::back();
        
    }
    
    public function delete($id)
    {
        
        $product = Products::find($id);
        try {
            $product->delete();
            Session::flash('success', 'The product was deleted');
        }
        catch (Exception $e) {
            Session::flash('error', 'Opps, there is some problem with this requisition, please try again soon or let us know');
        }
        
        return Redirect::back();
    }
}