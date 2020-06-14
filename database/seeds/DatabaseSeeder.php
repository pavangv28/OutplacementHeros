<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Schema;
//use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();

        $this->call(UserTableSeeder::class);
        $this->command->info('The admin data has been seeded!');
        Role::create(['name'=>'seeker']);  //Job Seeker
        Role::create(['name'=>'employer']); //Hiring employer
        Role::create(['name'=>'semployer']);  //Separating employer      
        Role::create(['name'=>'volunteer']);  //Mentor Support Volunteer
        Role::create(['name'=>'jvolunteer']);  //Job Search Support Volunteer
        Role::create(['name'=>'consultant']);  //Consultant

        $this->command->info('All other roles have been seeded!');

        Schema::enableForeignKeyConstraints();
       

    }
}
