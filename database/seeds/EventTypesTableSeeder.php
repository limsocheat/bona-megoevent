<?php

use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types  = [
            'Conference',
            'Seminar or Talk',
            'Tradeshow, Consumer Show, or Expo',
            'Convention',
            'Festival or Fair',
            'Concert or Performance',
            'Screening',
            'Dinner or Gala',
            'Festival or Fair',
            'Game or Competition',
            'Meeting or Networking Event',
            'Other',
        ];

        foreach ($types as $type) {
            EventType::create([
                'name'  => $type,
            ]);
        }
    }
}
