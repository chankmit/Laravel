<?php

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
        // $this->call(UsersTableSeeder::class);
        $cat = new \App\Category(); 
        $cat->name='Computer';
        $cat->detail='Learning about basic and advanced of computer technology.';
        $cat->status=1;
        $cat->save();
        
        $cat = new \App\Category();
        $cat->name='Artitecture';
        $cat->detail='The process and the product of planning, designing, and constructing buildings or any other structures.';
        $cat->status=1;
        $cat->save();

        $user = new \App\User(); 
        $user->name='Administrator'; 
        $user->email='chankmit@gmail.com';  
        $user->password=bcrypt('1234');  
        $user->role=1; 
        $user->status=1;
        $user->save();

    }
}
