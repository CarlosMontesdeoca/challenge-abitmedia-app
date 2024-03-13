<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function getAll(){
        return response()->json(CategoryResource::collection(Category::all()), 200);
    }
    
    public function create(Request $request){
        $cat = Category::where('name', $request->name)->first();

        if ($cat) {
            return response()->json(['error' => 'Registro duplicado'], 409);
        }
        return response()->json(Category::create($request->all()), 201);
    }
    
    public function update(Category $category, Request $request){
        $cat = Category::where('name', $request->name)
        ->where('id', '!=', $category->id)
        ->first();
        
        if ($cat) {
            return response()->json(['error' => 'Registro duplicado'], 409);
        }
        return response()->json($category->update($request->all()), 200);
    }
    
    public function delete(Category $category){
        return response()->json($category->delete(), 201);
    }
}
