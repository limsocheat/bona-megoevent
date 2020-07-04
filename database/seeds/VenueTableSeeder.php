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
                    'size'       => '10 x 10',
                    'width'      => 10,
                    'length'     => 10,
                    
                ],
                [
                    'name'       => 'B',
                    'size'       => '15 x 15',
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
