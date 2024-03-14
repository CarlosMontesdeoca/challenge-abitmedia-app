<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Http\Resources\ProductResoruce;

class ProductController extends Controller
{
    public function getAll(Category $category){
        if (!$category) {
            return response()->json([
                'error' => 'No existe la categoria ingresada'
            ], 404);
        }
        return response()->json(ProductResoruce::collection($category->products), 200);
    }
    
    public function create(Request $request){
        $key = Product::find($request->id);
        $logs = [];
        if($key) {
            return response()->json([
                'error' => 'La identificación SKU ya existe',
                'info' => $key
            ], 409);
        }
        if (strlen($request->id) != 10){ array_push($logs, 'Identificador SKU debe tener 10 caracteres');}
        if (!$request->desc || $request->desc === ''){ array_push($logs, 'No existe una descripción del producto');}
        if (Product::where('desc', $request->desc)
        ->where('category_id', $request->category_id)
        ->first()){ array_push($logs, 'El producto / Servicio que intenta ingresar ya existe');}
        if (count($logs) > 0){
            return response()->json([
                'error' => $logs
            ], 409);
        }
        return response()->json(Product::create($request->all()), 201);
    }
    
    public function update(Product $product, Request $request){
        return response()->json($product->update($request->all()), 200);
    }
    
    public function delete(Product $product){
        return response()->json($product->delete(), 201);
    }
}
