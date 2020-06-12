<?php

use App\Models\Event;
use App\User;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events     = [
            [
                'name'          => 'Get Your VIRTUAL Teach On!',
                'description'   => 'One or Two-Day Virtual Conference for 2nd-8th Grade Teachers on June 1-2, 2020',
                'image'         => '/events/1.jpg',
            ],
            [
                'name'          => 'The Afro-Peruvian Sextet\'s Livestreaming Experience',
                'description'   => 'In times of COVID-19, we will not stop playing for you. We are curating a professional three camara shoot for this special concert!',
                'image'         => '/events/2.jpg',
            ],
            [
                'name'          => 'Clarity in Chaos: Conscious Leadership in Uncertain Times',
                'description'   => 'The current economic challenges we face are unprecedented. These challenges can bring out the best in people … and the worst in people.',
                'image'         => '/events/3.jpg',
            ],
            [
                'name'          => 'Join the virtual administrator party of the year!',
                'description'   => 'Join the virtual administrator party of the year!',
                'image'         => '/events/4.jpg',
            ],
            [
                'name'          => 'Get Your Virtual LEAD On',
                'description'   => 'Join the virtual administrator party of the year! Experience a one-of-a-kind professional development experience for educational leaders!',
                'image'         => '/events/5.jpg',
            ],
            [
                'name'          => 'Teaching Mindfully',
                'description'   => 'ONLINE! This event will be going ahead online via video teleconferencing - we very much hope you can join us.',
                'image'         => '/events/6.jpg',
            ],
            [
                'name'          => 'HR Summer School: Virtual HR Event',
                'description'   => 'HR Summer School is an online virtual HR event designed to help HR leaders learn new concepts, earn their HR credits, and be better leaders',
                'image'         => '/events/7.jpg',
            ],
            [
                'name'          => 'The Virtual Beer Festival Episode 3',
                'description'   => 'The Virtual Beer Festival - Episode 3',
                'image'         => '/events/8.jpg',
            ],
            [
                'name'          => 'Twerk & Tone for FAT BURN!',
                'description'   => 'Twerk & Tone for FAT BURN is a Fun, High Energy Workout that follows a Tabata style workout. Tabata workouts are shorter but promotes Fat Loss, Increases Stamina and improves Aerobic and Anaerobic capacity. So get ready for TWERK & TONE!',
                'image'         => '/events/9.jpg',
            ],
            [
                'name'          => 'Daybreaker LIVE // Episode 11: Miami Salsa Dance Party',
                'description'   => 'Saturday, June 13th at 11AM Eastern Time (US), meet us for ONLINE for Daybreaker LIVE: Episode 11 - Miami Salsa Dance Party',
                'image'         => '/events/10.jpg',
            ],
            [
                'name'          => 'Daybreaker LIVE // Episode 10: Hawaii Dance Party',
                'description'   => 'Saturday, June 6th at 11am Eastern Time (US), meet us for ONLINE for Daybreaker LIVE: Episode 10: Hawaii Dance Party!',
                'image'         => '/events/11.jpg',
            ],
            [
                'name'          => 'Existential Contributions to Counselling and Psychotherapy - MICK COOPER ',
                'description'   => 'THIS WORKSHOP IS NOW FULL - YOU CAN ATTEND THE SAME WORKSHOP ON SUNDAY 7th JUNE USING THIS LINK HERE',
                'image'         => '/events/12.jpg',
            ],
        ];

        foreach($events as $event) {
            Event::create([
                'organizer_id'  => User::inRandomOrder()->first()->id,
                'name'          => $event['name'],
                'description'   => $event['description'],
                'image'         => $event['image'],
            ]);
        }
    }
}
