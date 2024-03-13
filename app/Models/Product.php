<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'serv',
        'category_id',
        'desc',
        'stock',
        'price'
    ];

    
    public function category() {
        return $this->hasMany(Category::class);
    }
}
