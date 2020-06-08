<?php

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides=[
            [
                'title'         => 'FESTIVALS & EVENTS',
                'sub_title'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!',
                'image'         => '/images/slider1.jpg',
                'location'      => 'entrance',
            ],
            [
                'title'         => 'FESTIVALS & EVENTS',
                'sub_title'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!',
                'image'         => 'images/slider2.jpg',
                'location'      => 'entrance',
            ]
            ,
            [
                'title'         => 'FESTIVALS & EVENTS',
                'sub_title'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!',
                'image'         => 'images/slider3.jpg',
                'location'      => 'entrance',
            ]
        ];

        foreach($slides as $slide){
            Slide::create($slide);
        }
    }
}
