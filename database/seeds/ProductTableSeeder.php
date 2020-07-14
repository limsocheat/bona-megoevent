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
        $products  = [
            [
                'name'         => 'IPhone 11 Pro (64GB)',
                'price'        => '1000',
                'quantity'     => '10',
                'image'        => 'images/products/product.png',
                'description'  => 'A transformative triple‑camera system that adds tons of capability without complexity. 
                                    An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes 
                                    the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.',
                'color'         => 'Black'
            ],
            [
                'name'         => 'ZTE Nubia Red Magic 5',
                'price'        => '700',
                'quantity'     => '10',
                'image'        => 'images/products/product1.png',
                'description'  => 'A transformative triple‑camera system that adds tons of capability without complexity. 
                                    An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes 
                                    the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.',
                'color'         => 'Black'
            ],
            [
                'name'         => 'Samsung Galaxy Note 9 (128GB)',
                'price'        => '300',
                'quantity'     => '10',
                'image'        => 'images/products/product2.png',
                'description'  => 'A transformative triple‑camera system that adds tons of capability without complexity. 
                                    An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes 
                                    the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.',
                'color'         => 'Black'
            ],
            [
                'name'         => 'Vivo V17',
                'price'        => '3500',
                'quantity'     => '1',
                'image'        => 'images/products/product3.png',
                'description'  => 'A transformative triple‑camera system that adds tons of capability without complexity. 
                                    An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes 
                                    the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.',
                'color'         => 'Black'
            ],
            [
                'name'         => 'IPhone 11 (256GB)',
                'price'        => '850',
                'quantity'     => '10',
                'image'        => 'images/products/product4.png',
                'description'  => 'A transformative triple‑camera system that adds tons of capability without complexity. 
                                    An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes 
                                    the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.',
                'color'         => 'Black'
            ],

            [
                'name'         => 'Realme-c 11',
                'price'        => '2500',
                'quantity'     => '10',
                'image'        => 'images/products/realme-c11.jpg',
                'description'  => 'A transformative triple‑camera system that adds tons of capability without complexity. 
                                    An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes 
                                    the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.',
                'color'         => 'Black'
            ],


        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
