<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        User::create([
            'name' => 'Syed Furquan',
            'email' => 'mail1@mail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
