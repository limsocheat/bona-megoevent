<?php

use App\Models\Exhibitor;
use App\User;
use Illuminate\Database\Seeder;

class ExhibitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 8; $i++) {

            $user           = User::create([
                'name'      => "Exhibitor $i",
                'email'     => "exhibitor$i@gmail.com",
                'password'  => bcrypt('secret'),
            ]);

            $user->assignRole('exhibitor');
        
            Exhibitor::create([
                'user_id'   => $user->id,
                'name'      => "Exhibitor $i",
                'logo'      => "/exhibitors/$i.jpg",
            ]);
        }
    }
}
