<?php

use App\Models\Exhibitor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            OptionsTableSeeder::class,
            EventTypesTableSeeder::class,
            EventCategoriesTableSeeder::class,
            EventsTableSeeder::class,
            ExhibitorsTableSeeder::class,
        ]);
    }
}
