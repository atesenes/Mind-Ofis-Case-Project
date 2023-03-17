<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Panele erişebilmemiz için varsayılan yöneticimizi ekliyoruz.
        $admin=array(
            'firstname' => 'Mind',
            'lastname' => 'Ofis',
            'email' => 'info@gmail.com',
            'password' => md5(12345),
            'usergroup' => 1
        );
        DB::table('users')->insert($admin);

        //Panele 2 adet varsayılan olarak dil etiketlerimizi ekliyoruz
        $lang=array(
            [
                'dilbaslik' => 'Türkçe',
                'diletiket' => 'tr',
                'dilsira' => 1,
                'dildurum' => 'on',
                'dilvarsayilan' => 'on'
            ],
            [

                'dilbaslik' => 'English',
                'diletiket' => 'en',
                'dilsira' => 2,
                'dildurum' => 'on',
                'dilvarsayilan' => 'off'
            ]);
        DB::table('site_languages')->insert($lang);

        //Varsayılan Settings Ayarlarını Ekliyoruz
        $lang=array(
            [
                'sitebaslik' => 'Mind Ofis',
                'siteaciklama' => 'Örnek Panel',
                'copyright' => null,
                'siteurl' => null,
                'sitemetahtml' => null,
                'sitesayackodu' => null
            ]);
        DB::table('site_settings')->insert($lang);

        $lang=array(
            [
                'siteeposta' => 'Mind Ofis',
                'siteadres' => 'Örnek Panel',
                'sitetelno' => null,
                'siteikincitelno' => null,
                'sitewhatsapp' => null,
                'sitefacebook' => null,
                'sitetwitter' => null,
                'siteinstagram' => null,
                'siteyoutube' => null,
                'sitelinkedin' => null,
                'siteharita' => null
            ]);
        DB::table('site_contants')->insert($lang);

    }
}
