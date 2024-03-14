<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'lic',
        'product_id',
        'client',
        'state'
    ];
    
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
