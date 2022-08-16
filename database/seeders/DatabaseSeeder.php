<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Persona;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Social;
use App\Models\User;
use Carbon\Carbon;
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
        // \App\Models\User::factory(10)->create();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('conchetukek'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now(),
        ]);

        $country = Country::create([
            'name' => 'Chile',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $city = City::create([
            'name' => 'Santiago',
            'country_id' => $country->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $persona = Persona::create([
            'city_id' => $city->id,
            'user_id' => $user->id,
            'name' => 'Alfonso',
            'lastname' => 'Castillo',
            'title' => 'Full-Stack Developer',
            'description' => 'Designing, developing and deploying modern Web Apps.
            LAMP Stack Specialist.',
            'about' => 'Full-Stack Developer with great skills in PHP, JAVA and JAVASCRIPT.
            I have a lot of experience writting code in raw language code, building Apps using object-oriented desing patterns as DAO, and DTO. I now specialize in developing modern Web Apps with the LAMP stack, using the PHP framework Laravel and his Full-Stack framework called Livewire.
            Also, I have some experience designing complex relational databases, having an advanced knowledge in SQL language.
            Linux skills, cloud services, LAMP Stack.',
            'status' => 0,
            'experience' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Social::create([
            'persona_id' => $persona->id,
            'name' => 'Github',
            'content' => 'https://github.com/kuronneko',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona->id,
            'name' => 'Email',
            'content' => 'aecastillodev@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona->id,
            'name' => 'WhatsApp',
            'content' => '56964599188',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Skill::create([
            'persona_id' => $persona->id,
            'name' => 'PHP',
            'level' => 99,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona->id,
            'name' => 'JAVA',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona->id,
            'name' => 'Javascript',
            'level' => 99,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project = Project::create([
            'persona_id' => $persona->id,
            'name' => 'cbpw',
            'title' => 'Cbpw gallery engine type-blog',
            'description' => 'Cbpw allows you to create an album and upload images.
            Manage your images with an amazing full one page menu, developed from scratch with Laravel and Livewire technology.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    }
}
