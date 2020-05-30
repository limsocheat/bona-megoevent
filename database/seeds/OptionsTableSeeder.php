<?php

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiences = [
            'Newbie - This is my first event',
            'Beginner - Not my first time, but I still need experience',
            'Intermediate - I have some past experience hosting events',
            'Expert - I have plenty of experience hosting events',
        ];

        foreach ($experiences as $experience) {
            Option::create([
                'name'  => $experience,
                'type'  => 'event_experience'
            ]);
        }

        $teams      = [
            'Just me',
            '1 - 5 people',
            '6 - 10 people',
            '11 - 20 people',
            'More than 20'
        ];

        foreach ($teams as $team) {
            Option::create([
                'name'  => $team,
                'type'  => 'event_team'
            ]);
        }

        $frequencies      = [
            'Just me',
            'Weekly',
            'Monthly',
            'A few times a year',
            'Once a year'
        ];

        foreach ($frequencies as $frequency) {
            Option::create([
                'name'  => $frequency,
                'type'  => 'event_frequency'
            ]);
        }

        $attendances      = [
            '20 attendees or fewer',
            '21 - 50 attendees',
            '51 - 100 attendees',
            'More than 100',
        ];

        foreach ($attendances as $attendance) {
            Option::create([
                'name'  => $attendance,
                'type'  => 'event_attendance'
            ]);
        }

        $locations = [
            'Venue',
            'Online event',
            'To be announced',
        ];

        foreach ($locations as $location) {
            Option::create([
                'name'  => $location,
                'type'  => 'event_location'
            ]);
        }
    }
}
