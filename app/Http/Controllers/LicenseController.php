<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\License;
use App\Models\Product;

use App\Http\Resources\LicensesResoruce;

class LicenseController extends Controller
{
    public function getAll(Product $product){
        if (!$product) {
            return response()->json([
                'error' => 'No existe el producto ingresada'
            ], 404);
        }
        return response()->json(LicensesResoruce::collection($product->licenses), 200);
    }
    
    public function create(Request $request){
        for ($i = 0; $i < $request->cant; $i++) {
            $license = $this->generateUniqueLicense();
            License::create(['product_id' => $request->product_id, 'lic' => $license]);
        }
        return response()->json("$request->cant licencias ingresadas.", 201);
    }
    
    public function update(Product $product, Request $request){
        $licenses = $product->licenses->where('state', 'A');
        if ($request->cant > count($licenses)){
            return response()->json([
                'error' => 'No existe suficientes licencias'
            ], 404); 
        }
        for ($i = 0; $i < $request->cant; $i++){
            $licenses[$i]->update([
                'state' => 'I',
                'client' => $request->client
            ]);
        }
        return response()->json("$request->cant licencias vendidas", 200);
    }
    
    public function delete(License $license){
        return response()->json($license->delete(), 201);
    }

    private function generateUniqueLicense()
    {
        $license = Str::random(100);
        
        // Verificar si el serial ya existe en la base de datos
        while (License::where('lic', $license)->exists()) {
            $license = Str::random(100);
        }

        return $license;
    }
}
