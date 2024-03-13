<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class LicensesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::where('name', '!=', 'SERVICIO')->get();

        foreach ($categories as $category) {
            $products = $category->products;
            foreach ($products as $product) {
                
            }
        }

    }
}
