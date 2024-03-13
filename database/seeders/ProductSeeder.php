<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $serv = Category::where('name', 'SERVICIO')->first()->id;
        $antv = Category::where('name', 'ANTIVIRUS')->first()->id;
        $ofim = Category::where('name', 'OFIMATICA')->first()->id;
        $edvi = Category::where('name', 'EDITOR VIDEO')->first()->id;
        //Creando lista de productos
        Product::create(['id' => '0010020011','serv' => false,'category_id' => $antv,'desc' => 'Licencia para Windows','stock' =>  10,'price' => 5]);
        Product::create(['id' => '0010020012','serv' => false,'category_id' => $antv,'desc' => 'Licencia para Mac','stock' => 10,'price' =>  7]);
        
        Product::create(['id' => '0010030011','serv' => false,'category_id' => $ofim,'desc' => 'Licencia para Windows','stock' =>  20,'price' => 10]);
        Product::create(['id' => '0010030012','serv' => false,'category_id' => $ofim,'desc' => 'Licencia para Mac','stock' => 20,'price' =>  12]);
        
        Product::create(['id' => '0010040011','serv' => false,'category_id' => $edvi,'desc' => 'Licencia para Windows','stock' =>  30,'price' => 20]);
        Product::create(['id' => '0010040012','serv' => false,'category_id' => $edvi,'desc' => 'Licencia para Mac','stock' => 30,'price' =>  22]);

        //Creando lista de servicios
        Product::create(['id' => '0020010011','serv' => true, 'category_id' => $serv,'desc' => 'Formateo de computadores','price' => 25]);
        Product::create(['id' => '0020020012','serv' => true, 'category_id' => $serv,'desc' => 'Mantenimiento','price' =>  30]);
        Product::create(['id' => '0020030013','serv' => true, 'category_id' => $serv,'desc' => 'Hora de soporte en Software','price' => 50]);        
    }
}
