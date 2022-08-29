<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Detail;
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

        /////// Country and Cities ///////
        $country = Country::create([
            'name' => 'Chile',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $country2 = Country::create([
            'name' => 'Czech Republic',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $city = City::create([
            'name' => 'Calama',
            'country_id' => $country->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $city2 = City::create([
            'name' => 'Prague',
            'country_id' => $country2->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        ////////////// Users ///////////////

        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now(),
        ]);
        $user2 = User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now(),
        ]);

        /////// Persona1, Project1 ///////

        $persona1 = Persona::create([
            'city_id' => $city->id,
            'user_id' => $user1->id,
            'name' => 'Alfonso',
            'lastname' => 'Castillo',
            'title' => 'Full-Stack Developer',
            'description' => 'Designing, developing and deploying modern Web Apps.
            LAMP Stack Specialist.',
            'about' => 'Full-Stack Developer with great skills in PHP, JAVA and JAVASCRIPT.
            I have a lot of experience writting code in raw language code, building Apps using object-oriented desing patterns as DAO, and DTO. I now specialize in developing modern Web Apps with the LAMP stack, using the PHP framework Laravel and his Full-Stack framework called Livewire.
            Also, I have some experience designing complex relational databases, having an advanced knowledge in SQL language.
            Linux skills, cloud services, LAMP Stack.',
            'status' => 1,
            'experience' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Social::create([
            'persona_id' => $persona1->id,
            'name' => 'GitHub',
            'content' => 'https://github.com/kuronneko',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona1->id,
            'name' => 'Twitter',
            'content' => 'https://twitter.com/kuronnekos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona1->id,
            'name' => 'Instagram',
            'content' => 'https://www.instagram.com/cbpwxyz',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona1->id,
            'name' => 'Email',
            'content' => 'aecastillodev@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona1->id,
            'name' => 'WhatsApp',
            'content' => '56964599188',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'PHP',
            'level' => 98,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'JAVA',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'SQL',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Laravel',
            'level' => 98,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Livewire',
            'level' => 98,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'SpringBoot',
            'level' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'HTML',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'CSS',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Javascript',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'AlpineJS',
            'level' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Bootstrap',
            'level' => 100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Jquery',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'VueJS',
            'level' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Figma',
            'level' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Powerdesigner',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'GIMP',
            'level' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Linux',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'Apache',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona1->id,
            'name' => 'MySQL',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project1_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => 'Cbpw',
            'title' => 'Cbpw gallery engine type-blog',
            'description' => 'Cbpw allows you to create an album and upload images.
            Manage your images with an amazing full one page menu, developed from scratch with Laravel and Livewire technology.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project1_p1->id,
            'description' => 'Admin Panel and Permissions System',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p1->id,
            'description' => 'Relational Database design from Scratch',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p1->id,
            'description' => 'Dropzone to upload images',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p1->id,
            'description' => 'Front-end developed with Boostrap 4 and Livewire to asyncronous
            request. Masonry, FancyBox and Infinite Scroll use to show Images',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p1->id,
            'description' => 'Image render with thumbnail generator using Intervention Image
            2.0, and Laravel-FFMPEG/Lakshmaji-Thumbnail to generate thumbnails from Videos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project2_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => 'Sexygatitas',
            'title' => 'Sexygatitas',
            'description' => 'Escort advertising service with a free/paid business model and SEO optimized.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project2_p1->id,
            'description' => 'Nekasprototype(code name) was developed using the Cbpw gallery engine type-blog [2.22070] as a base and modified as per requirements',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project2_p1->id,
            'description' => 'WaterMarks Support using Intervention Image 2.0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project2_p1->id,
            'description' => 'Resized Images to optimice loading times using Intervention Image 2.0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project2_p1->id,
            'description' => 'Register UI was fully developed using Livewire',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project3_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => 'Javparadise',
            'title' => 'Javparadise',
            'description' => 'Jav-tube website. A nicely business model to earn money with Ads.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project3_p1->id,
            'description' => 'Javparadise was developed using the Cbpw gallery engine type-blog [2.22360] as a base and modified as per requirements',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project3_p1->id,
            'description' => 'Modified relational database to supports tags, categories and studios with a many to many relationship',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project3_p1->id,
            'description' => 'Amazing bar filter fully developed with Livewire',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project4_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => 'Kuro2et',
            'title' => 'Kuroneko EncrypterTool',
            'description' => 'Simple algorithm for encrypting text, based on the hexadecimal system. This console application works as a password manager using the kuro algorithm to encrypt text and store it in a database.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project4_p1->id,
            'description' => 'Algorithm written from scratch using raw JAVA',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project4_p1->id,
            'description' => 'Has a GUI Swing version',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project5_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => '3lectrotel',
            'title' => '3lectrotel',
            'description' => 'Web App that allows you to generate statistical graphs of the information obtained through report forms.
            Old App built with raw PHP.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project5_p1->id,
            'description' => 'Developed from scratch using raw PHP, bootstrap 4 and Jquery',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project5_p1->id,
            'description' => 'HighCharts Library to show statistical graphics',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project5_p1->id,
            'description' => 'Advanced SQL queries',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project6_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => 'wikiPlantas',
            'title' => 'wikiPlantas',
            'description' => 'wikiPlantas is a web application designed to build a repository with information about plants and herbs.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project6_p1->id,
            'description' => 'Laravel-Permission System Implemented',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project6_p1->id,
            'description' => 'Stisla UI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project6_p1->id,
            'description' => 'Tags System',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project6_p1->id,
            'description' => 'Attach Multiple Images',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project7_p1 = Project::create([
            'persona_id' => $persona1->id,
            'name' => 'ApiGestor9000',
            'title' => 'ApiGestor9000',
            'description' => 'PortofolioGestor9000 is an API developed with Laravel and VueJS technologies. The API was developed with Laravel using a relational database design from scratch, and VueJS+Boostrap5 was used for the user interface and managing the database content via the API.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project7_p1->id,
            'description' => 'Relational Database desing from Scratch',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p1->id,
            'description' => 'Laravel API',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p1->id,
            'description' => 'VueJS to asyncronous request',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p1->id,
            'description' => 'Bootstrap 5 for the UI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p1->id,
            'description' => 'Forms Validate with Vuelidate, Pop-up Messages with SweetAlert2, Loader effect with VueLoader',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

           /////// Persona2, Project2 ///////

        $persona2 = Persona::create([
            'city_id' => $city2->id,
            'user_id' => $user1->id,
            'name' => 'Sebastian',
            'lastname' => 'Václav',
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
            'persona_id' => $persona2->id,
            'name' => 'GitHub',
            'content' => 'https://github.com/kuronneko',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona2->id,
            'name' => 'Twitter',
            'content' => 'https://twitter.com/kuronnekos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona2->id,
            'name' => 'Instagram',
            'content' => 'https://www.instagram.com/cbpwxyz',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona2->id,
            'name' => 'Email',
            'content' => 'sebastianvaclav@proton.me',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Social::create([
            'persona_id' => $persona2->id,
            'name' => 'WhatsApp',
            'content' => '56943497798',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'PHP',
            'level' => 98,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'JAVA',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'SQL',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Laravel',
            'level' => 98,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Livewire',
            'level' => 98,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'SpringBoot',
            'level' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'HTML',
            'level' => 90,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'CSS',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Javascript',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'AlpineJS',
            'level' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Bootstrap',
            'level' => 100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Jquery',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'VueJS',
            'level' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Figma',
            'level' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Powerdesigner',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'GIMP',
            'level' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Linux',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'Apache',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Skill::create([
            'persona_id' => $persona2->id,
            'name' => 'MySQL',
            'level' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project1_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => 'Cbpw',
            'title' => 'Cbpw gallery engine type-blog',
            'description' => 'Cbpw allows you to create an album and upload images.
            Manage your images with an amazing full one page menu, developed from scratch with Laravel and Livewire technology.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project1_p2->id,
            'description' => 'Admin Panel and Permissions System',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p2->id,
            'description' => 'Relational Database design from Scratch',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p2->id,
            'description' => 'Dropzone to upload images',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p2->id,
            'description' => 'Front-end developed with Boostrap 4 and Livewire to asyncronous
            request. Masonry, FancyBox and Infinite Scroll use to show Images',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project1_p2->id,
            'description' => 'Image render with thumbnail generator using Intervention Image
            2.0, and Laravel-FFMPEG/Lakshmaji-Thumbnail to generate thumbnails from Videos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project2_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => 'Sexygatitas',
            'title' => 'Sexygatitas',
            'description' => 'Escort advertising service with a free/paid business model and SEO optimized.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project2_p2->id,
            'description' => 'Nekasprototype(code name) was developed using the Cbpw gallery engine type-blog [2.22070] as a base and modified as per requirements',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project2_p2->id,
            'description' => 'WaterMarks Support using Intervention Image 2.0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project2_p2->id,
            'description' => 'Resized Images to optimice loading times using Intervention Image 2.0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project2_p2->id,
            'description' => 'Register UI was fully developed using Livewire',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project3_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => 'Javparadise',
            'title' => 'Javparadise',
            'description' => 'Jav-tube website. A nicely business model to earn money with Ads.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project3_p2->id,
            'description' => 'Javparadise was developed using the Cbpw gallery engine type-blog [2.22360] as a base and modified as per requirements',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project3_p2->id,
            'description' => 'Modified relational database to supports tags, categories and studios with a many to many relationship',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project3_p2->id,
            'description' => 'Amazing bar filter fully developed with Livewire',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project4_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => 'Kuro2et',
            'title' => 'Kuroneko EncrypterTool',
            'description' => 'Simple algorithm for encrypting text, based on the hexadecimal system. This console application works as a password manager using the kuro algorithm to encrypt text and store it in a database.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project4_p2->id,
            'description' => 'Algorithm written from scratch using raw JAVA',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project4_p2->id,
            'description' => 'Has a GUI Swing version',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project5_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => '3lectrotel',
            'title' => '3lectrotel',
            'description' => 'Web App that allows you to generate statistical graphs of the information obtained through report forms.
            Old App built with raw PHP.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project5_p2->id,
            'description' => 'Developed from scratch using raw PHP, bootstrap 4 and Jquery',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project5_p2->id,
            'description' => 'HighCharts Library to show statistical graphics',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project5_p2->id,
            'description' => 'Advanced SQL queries',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project6_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => 'wikiPlantas',
            'title' => 'wikiPlantas',
            'description' => 'wikiPlantas is a web application designed to build a repository with information about plants and herbs.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project6_p2->id,
            'description' => 'Laravel-Permission System Implemented',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project6_p2->id,
            'description' => 'Stisla UI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project6_p2->id,
            'description' => 'Tags System',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project6_p2->id,
            'description' => 'Attach Multiple Images',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $project7_p2 = Project::create([
            'persona_id' => $persona2->id,
            'name' => 'ApiGestor9000',
            'title' => 'ApiGestor9000',
            'description' => 'PortofolioGestor9000 is an API developed with Laravel and VueJS technologies. The API was developed with Laravel using a relational database design from scratch, and VueJS+Boostrap5 was used for the user interface and managing the database content via the API.',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Detail::create([
            'project_id' => $project7_p2->id,
            'description' => 'Relational Database desing from Scratch',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p2->id,
            'description' => 'Laravel API',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p2->id,
            'description' => 'VueJS to asyncronous request',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p2->id,
            'description' => 'Bootstrap 5 for the UI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Detail::create([
            'project_id' => $project7_p2->id,
            'description' => 'Forms Validate with Vuelidate, Pop-up Messages with SweetAlert2, Loader effect with VueLoader',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    }
}
