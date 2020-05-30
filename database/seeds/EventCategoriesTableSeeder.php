<?php

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories  = [
            'Music',
            'Business & Professional',
            'Food & Drink',
            'Community & Culture',
            'Performing & Visual Arts',
            'Film, Media & Entertainment',
            'Sports & Fitness',
            'Health & Wellness',
            'Hobbies & Special Interest',
            'Home & Lifestyle',
            'Music',
            'Other',
        ];

        foreach ($categories as $category) {
            EventCategory::create([
                'name'  => $category,
            ]);
        }
    }
}
