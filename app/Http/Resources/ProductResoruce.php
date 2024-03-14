<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Product;

class ProductResoruce extends JsonResource
{
    public function toArray(Request $request): array
    {
        $product = Product::find($this->id);
        return [
            'id' => $product->id,
            'sku' => $product->sku,
            'serv' => $product->serv,
            'category_id' => $product->category_id,
            'desc' => $product->desc,
            'price' => $product->price,
            'cant' => count($product->licenses),
            'licenses' => ($product->serv) ? null : "/api/product/$this->id/licenses"
        ];
    }
}
