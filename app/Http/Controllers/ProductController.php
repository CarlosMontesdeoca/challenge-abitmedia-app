<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Product;

class ProductController extends Controller
{
    public function getAll(){
        return response()->json(Product::all(), 200);
    }
    
    public function create(Request $request){
        return response()->json(Product::create($request->all()), 201);
    }
    
    public function update(Product $product, Request $request){
        return response()->json($category->update($request->all()), 200);
    }
    
    public function delete(Product $product){
        return response()->json($category->delete(), 201);
    }
}
