<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Retailers;
use DB;
use Response;

class ApiController extends Controller
{
    public function productList()
    {
        $products = Products::get();
        
        $list = array();
        foreach ($products as $key => $product) {
            $product['retailer']    = $product->retailer->name;
            $list['products'][$key] = $product;
        }
        
        return response()->json($list);
    }
    
    public function product($id)
    {
        $product = Products::whereRaw("idproduct = " . $id . "")->get();
        
        $item = array();
        foreach ($product as $key => $product) {
            $product['retailer']   = $product->retailer->name;
            $item['product'][$key] = $product;
        }
        
        return response()->json($item);
    }
    
    public function retailer($id)
    {
        
        $retailer = Retailers::whereRaw("idretailer = " . $id)->get();
        
        $list = array();
        foreach ($retailer as $key => $ret) {
            $ret['products']        = $ret->products;
            $list['retailer'][$key] = $ret;
        }
        
        return response()->json($list);
    }
}