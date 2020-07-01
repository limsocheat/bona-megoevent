<?php

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productcategories = [
                    [
                        'name'          => 'Phone',
                        'description'   => 'phone',
                        'active'        => '1'
                    ],
                    [
                        'name'          => 'Computer',
                        'description'   => 'computer',
                        'active'        => '1'
                    ],
                     
        ];
        foreach($productcategories as $productcategory){
            ProductCategory::create($productcategory);
        }
    }
}
