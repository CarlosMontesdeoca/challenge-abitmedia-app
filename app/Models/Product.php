<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'serv',
        'category_id',
        'desc',
        'stock',
        'price'
    ];

    public function licenses() {
        return $this->hasMany(License::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
