<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\License;

class LicensesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::where('name', '!=', 'SERVICIO')->get();

        foreach ($categories as $category) {
            $products = $category->products;
            foreach ($products as $product) {
                $i = 0;
                switch ($category->name) {
                    case 'ANTIVIRUS':
                        $i = 10;
                        break;
                    
                    case 'OFIMATICA':
                        $i = 20;
                        break;

                    case 'EDITOR VIDEO':
                        $i = 30;
                        break;
                }
                for ($j = 0; $j < $i; $j++) {
                    $license = $this->generateUniqueLicense();
                    License::create(['product_id' => $product->id, 'lic' => $license]);
                }
            }
        }

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
