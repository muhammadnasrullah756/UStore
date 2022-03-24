<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kazuki',
            'email' => 'kazuki@gmail.com',
            'password' => bcrypt('kazuki123'),
            'roles' => 'admin'
        ]);
    }
}
