<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products  =[
             [
                 'name'         => 'IPhone 11 Pro (64GB)',
                 'price'        => '1000',
                 'quantity'     => '10',
                 'image'        => '/products/product.png',
             ],
             [
                 'name'         => 'ZTE Nubia Red Magic 5',
                 'price'        => '700',
                 'quantity'     => '10',
                 'image'        => '/products/product1.png',
             ],
             [
                 'name'         => 'Samsung Galaxy Note 9 (128GB)',
                 'price'        => '300',
                 'quantity'     => '10',
                 'image'        => '/products/product2.png',
             ],
              [
                 'name'         => 'Vivo V17',
                 'price'        => '3500',
                 'quantity'     => '1',
                 'image'        => '/products/product3.png',
             ],
             [
                 'name'         => 'IPhone 11 (256GB)',
                 'price'        => '850',
                 'quantity'     => '10',
                 'image'        => '/products/product4.png',
             ],
             [
                 'name'         => 'IPhone 11 Pro Max',
                 'price'        => '950',
                 'quantity'     => '10',
                 'image'        => '/products/product5.png',
             ],
             

        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
