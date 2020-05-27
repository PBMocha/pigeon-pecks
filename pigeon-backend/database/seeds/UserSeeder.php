<?php

use Illuminate\Database\Seeder;
use App\User;

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
        factory(App\User::class)->create(['name'=>'Tester', 'email'=>'tester@test.com']); //password = password
        factory(App\User::class, 10)->create();


    }
}
