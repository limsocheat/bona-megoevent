<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting()->set([
            'event'       => [
                'grid_block_value'  => 2,
                'tax_percentage'    => 7,
            ],
        ]);
        setting()->save();
    }
}
