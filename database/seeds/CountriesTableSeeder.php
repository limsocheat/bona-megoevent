<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries      = [
            'Singapore', 'Malaysia', 'Vietnam', 'Cambodia'
        ];

        foreach($countries as $country)
        {
            Country::create([
                'name'  => $country,
            ]);
        }
    }
}
