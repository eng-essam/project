<?php

namespace Database\Seeders;

use App\Models\Union;
use Illuminate\Database\Seeder;

class UnionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Union::create([
            'name' => 'الصيدلة',
            'phone' => '01012547812'
        ]);

        Union::create([
            'name' => 'الاسنان',
            'phone' => '01123456789'
        ]);

        Union::create([
            'name' => 'طب بشري',
            'phone' => '01231549678'
        ]);

        Union::create([
            'name' => 'طب بطري',
            'phone' => '01312461845'
        ]);  
    }
}
