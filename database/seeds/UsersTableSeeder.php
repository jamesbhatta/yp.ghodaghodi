<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'jmsbhatta@gmail.com',
            'name' => 'James Bhatta',
            'password' => bcrypt('password'),
            'email_verified_at' => \Carbon\Carbon::now()
            ]);
    }
}
