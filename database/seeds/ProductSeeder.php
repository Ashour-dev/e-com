<?php

use App\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $brands=['Nike','Louis Vuitton','Hermes','Gucci','Adidas','Zara','H&M'];
        $sizes=['XS','S','M','L','XL','XXL'];

        $picsQuery = Http::get('https://api.unsplash.com/search/photos?client_id='.env("APP_UnSplash").'&&query=clothing-product&&per_page=30');
        $pics = json_decode($picsQuery->getBody(), true);
        for($p=0;$p<30;$p++){
            $prodPhoto[$p]=$pics['results'][$p]['urls']['full'];
        }
        for($i=0;$i<30;$i++){
            $newProduct= new Product();
            $newProduct->name= $faker->word();
            $newProduct->brand= $faker->randomElement($brands);
            $newProduct->description= $faker->paragraph();
            $newProduct->size= $faker->randomElement($sizes);
            $newProduct->price= $faker->randomFloat(2,5,80);
            $newProduct->photo= $prodPhoto[$i];
            $newProduct->save();
        }
    }
}
