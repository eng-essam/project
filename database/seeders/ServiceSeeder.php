<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'nameen' => 'renewals',
            'namear' => 'تجديد العضوية',
        ]);

        Service::create([
            'nameen' => 'alternatives',
            'namear' => 'استخراج بدل فائد للكارنية',
        ]);

        Service::create([
            'nameen' => 'treatments',
            'namear' => 'اعانة العلاج الشهري',
        ]);

        Service::create([
            'nameen' => 'educationfees',
            'namear' => 'اعانة رسوم التعليم',
        ]);

        Service::create([
            'nameen' => 'diseases',
            'namear' => 'اعانة الامراض المزمنة',
        ]);

        Service::create([
            'nameen' => 'conditions',
            'namear' => 'اعانة ظروف حبس احتياطي',
        ]);

        Service::create([
            'nameen' => 'noworks',
            'namear' => 'القيد بجدول غير المشتغلين',
        ]);

        Service::create([
            'nameen' => 'evictioncerts',
            'namear' => 'استخراج شهادة إخلاء طرف',
        ]);

        Service::create([
            'nameen' => 'experiencecerts',
            'namear' => 'استخراج شهادة خبرة من إدارة الصيدلة',
        ]);

        Service::create([
            'nameen' => 'clinicscerts',
            'namear' => 'القيد بسجل العيادات البيطرية',
        ]);

        Service::create([
            'nameen' => 'recruitments',
            'namear' => 'إعانة تجنيد',
        ]);

        Service::create([
            'nameen' => 'consultantcards',
            'namear' => 'استخراج كارنية استشاري',
        ]);

        Service::create([
            'nameen' => 'specialistcards',
            'namear' => 'استخراج كارنية أخصائي',
        ]);

        Service::create([
            'nameen' => 'professionlicenses',
            'namear' => 'استخراج ترخيص مزاولة المهنة',
        ]);

        Service::create([
            'nameen' => 'privateclinics',
            'namear' => 'تسجيل عيادة خاصة',
        ]);

        Service::create([
            'nameen' => 'specialiststables',
            'namear' => 'القيد بجدول االخصائيين',
        ]);

        Service::create([
            'nameen' => 'professionlicens',
            'namear' => 'استخراج ترخيص مزاولة المهنة',
        ]);  
    }
}
