<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Category;

class CategoryController extends Controller
{
    public function getAll(){
        return response()->json(Category::all(), 200);
    }
    
    public function create(Request $request){
        return response()->json(Category::create($request->all()), 201);
    }
    
    public function update(Category $category, Request $request){
        return response()->json($category->update($request->all()), 200);
    }
    
    public function delete(Category $category){
        return response()->json($category->delete(), 201);
    }
}
