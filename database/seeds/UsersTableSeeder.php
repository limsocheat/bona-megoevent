<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrators = [
            [
                'name'      => 'admin',
                'email'     => 'itmall.com.kh@gmail.com',
                'password'  => bcrypt('Bona@123'),
            ]
        ];

        foreach($administrators as $administrator) {
            $admin = User::create($administrator);
            $admin->assignRole('administrator');
        }
    }
}
