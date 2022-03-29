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
            'password' => Hash::make('12345678'),
            'ssn' => '0101277772',
            'phone' => '0101999999',
            'sex' => 'ذكر',
            'union_id' => '1',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'عبد الهادي مصطفي',
            'email' => 'abdo@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '12124545',
            'phone' => '01741547812',
            'sex' => 'ذكر',
            'union_id' => '2',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'عزت صادق',
            'email' => 'ezat@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '01013217812',
            'phone' => '01013211812',
            'sex' => 'ذكر',
            'union_id' => '3',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'احمد زيان',
            'email' => 'ahmed@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '755552775',
            'phone' => '010125841812',
            'sex' => 'ذكر',
            'union_id' => '4',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'ميار احمد احمد',
            'email' => 'mayar@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '0107127771',
            'phone' => '01071999991',
            'sex' => 'انثي',
            'union_id' => '1',
            'role_id' => '2',
        ]);

        User::create([
            'name' => 'اسراء احمد محمد',
            'email' => 'esra@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '121724545',
            'phone' => '0171547812',
            'sex' => 'انثي',
            'union_id' => '2',
            'role_id' => '2',
        ]);

        User::create([
            'name' => 'مها يوسف السيد',
            'email' => 'maha@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '01013217872',
            'phone' => '01013211814',
            'sex' => 'انثي',
            'union_id' => '3',
            'role_id' => '2',
        ]);

        User::create([
            'name' => 'روان حمدي محمد',
            'email' => 'rawan@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '75555775',
            'phone' => '010125871817',
            'sex' => 'انثي',
            'union_id' => '4',
            'role_id' => '2',
        ]);

        User::create([
            'name' => 'حمدي محمد محمد',
            'email' => 'hamdy@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '07127771',
            'phone' => '071999991',
            'sex' => 'ذكر',
            'union_number' =>rand(),
            'union_id' => '1',
            'role_id' => '3',
        ]);

        User::create([
            'name' => 'علي محمد السيد',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '1224545',
            'phone' => '07154782',
            'sex' => 'ذكر',
            'union_id' => '2',
            'union_number' =>rand(),
            'role_id' => '3',
        ]);

        User::create([
            'name' => 'ايهاب حمدي ابراهيم',
            'email' => 'ehab@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '101321782',
            'phone' => '010121814',
            'sex' => 'ذكر',
            'union_id' => '3',
            'union_number' =>rand(),
            'role_id' => '3',
        ]);

        User::create([
            'name' => 'خالد احمد يوسف',
            'email' => 'khaled@gmail.com',
            'password' => Hash::make('12345678'),
            'ssn' => '7555775',
            'phone' => '0025871817',
            'union_number' =>rand(),
            'sex' => 'ذكر',
            'union_id' => '4',
            'role_id' => '3',
        ]);
    }
}
