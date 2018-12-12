<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Retailers;
use Redirect;
use Session;
use Image;

class RetailersController extends Controller
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

        $retailers = Retailers::orderBy("name", "ASC")->get();
        return view('admin/retailers/list', compact('retailers'));
    }
    
    public function create()
    {
        
        return view('admin/retailers/create');
    }
    
    public function store(Request $request)
    {
        
        $data = $request->all();
        
        if (Input::file('image_path')) {
            $image    = Input::file('image_path');
            $filename = md5($_FILES['image_path']['name']) . '.' . $image->getClientOriginalExtension();
            $path     = public_path() . '/uploads/retailers/' . $filename;
            Image::make($image->getRealPath())->save($path);
            $data['image_path'] = $filename;
        }
        
        $data['created_at'] = date("Y-m-d H:i:s");
        
        if (isset($data['status']))
            $data['status'] = 1;
        
        try {
            Retailers::create($data);
            Session::flash('success', 'The retailer was created');
        }
        catch (Exception $e) {
            Session::flash('error', 'Opps, there is some problem with this requisition, please try again soon or let us know');
        }
        
        return Redirect::back();
    }
    
    public function edit($id)
    {
        
        $retailer = Retailers::find($id);
        return view('admin/retailers/edit', compact('retailer'));
    }
    
    public function update($id, Request $request)
    {
        
        $retailer = Retailers::find($id);
        $data     = $request->all();
        
        $retailer->description = $data['description'];
        $retailer->updated_at  = date("Y-m-d H:i:s");
        $retailer->website     = $data['website'];
        $retailer->name        = $data['name'];
        
        if (isset($data['status']))
            $retailer->status = 1;
        
        if (Input::file('image_path')) {
            $image    = Input::file('image_path');
            $filename = md5($_FILES['image_path']['name']) . '.' . $image->getClientOriginalExtension();
            $path     = public_path() . '/uploads/retailers/' . $filename;
            Image::make($image->getRealPath())->save($path);
            $retailer->image_path = $filename;
        }
        
        try {
            $retailer->save();
            Session::flash('success', 'The retailer was updated');
        }
        catch (Exception $e) {
            Session::flash('error', 'Opps, there is some problem with this requisition, please try again soon or let us know');
        }
        
        return Redirect::back();
        
    }
    
    public function delete($id)
    {
        
        $retailer = Retailers::find($id);
        $products = Products::whereRaw("idretailer = " . $id)->get();
        if (count($products) > 0)
            Session::flash('error', 'You cannot remove a retailer that has products, first delete his products');
        
        try {
            $retailer->delete();
            Session::flash('success', 'The retailer was deleted');
        }
        catch (Exception $e) {
            Session::flash('error', 'Opps, there is some problem with this requisition, please try again soon or let us know');
        }
        
        return Redirect::back();
    }
}