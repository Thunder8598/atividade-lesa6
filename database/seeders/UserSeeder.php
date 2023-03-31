<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Caique Daniel',
            'email' => 'caiquedaniel8@gmail.com',
            'password' => Hash::make('1234')
        ]);

        $user->saveOrFail();
    }
}
