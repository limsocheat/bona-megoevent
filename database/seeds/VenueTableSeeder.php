<?php

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venues    =[
                [
                    'name'       => 'A',
                    'width'      => 10,
                    'length'     => 10,
                    
                ],
                [
                    'name'       => 'B',
                    'width'      => 15,
                    'length'     => 15,
                    'level'      => 1  
                ]
        ];
        foreach($venues as $venue){
            Venue::create($venue);
        }
    }
}
