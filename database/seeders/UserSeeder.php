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
        User::create([
            'name' => 'عصام حمدي العجمي',
            'email' => 'essam@gmail.com',
            'password' => Hash::make('123456'),
            'ssn' => '0101277772',
            'phone' => '0101999999',
            'sex' => 'male',
            'union_id' => '1',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'عبد الهادي مصطفي',
            'email' => 'abdo@gmail.com',
            'password' => Hash::make('123456'),
            'ssn' => '12124545',
            'phone' => '01741547812',
            'sex' => 'male',
            'union_id' => '2',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'عزت صادق',
            'email' => 'ezat@gmail.com',
            'password' => Hash::make('123456'),
            'ssn' => '01013217812',
            'phone' => '01013211812',
            'sex' => 'male',
            'union_id' => '3',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'احمد زيان',
            'email' => 'ahmed@gmail.com',
            'password' => Hash::make('123456'),
            'ssn' => '755552775',
            'phone' => '010125841812',
            'sex' => 'male',
            'union_id' => '4',
            'role_id' => '1',
        ]);
    }
}
