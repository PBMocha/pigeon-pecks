<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class)->create(['name'=>'Tester', 'email'=>'tester@test.com']); //password = password
        factory(User::class, 10)->create(); // create and store 10 dummy users to the database

    }
}
