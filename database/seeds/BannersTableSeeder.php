<?php

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'location'  => 'header',
            'name'      => 'Header Banner',
            'link'      => 'https://facebook.com',
            'image'     => '/banners/header.png',
        ]);

        Banner::create([
            'location'  => 'subheader1',
            'name'      => 'Subheader 1 Banner',
            'link'      => 'https://facebook.com',
            'image'     => '/banners/subheader1.png',
        ]);

        Banner::create([
            'location'  => 'subheader2',
            'name'      => 'Subheader 2 Banner',
            'link'      => 'https://facebook.com',
            'image'     => '/banners/subheader2.png',
        ]);
    }
}
