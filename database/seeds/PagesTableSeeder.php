<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'slug'          => 'about',
            'title'         => 'About Us',
            'description'   => '',
        ]);

        Page::create([
            'slug'          => 'contact',
            'title'         => 'Contact',
            'description'   => '',
        ]);
    }
}
