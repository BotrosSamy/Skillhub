<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Setting::create([
                        
            'email'=>'botros@admin.com',
            'phone'=>'01220232579',  
            'facebook'=>'https:/www.fcebook.com',
            'twitter'=>'https:/www.twitter.com',
            'youtube'=>'https:/www.youtube.com',
            'linkedin'=>'https:/www.linkedin.com',
     ]);
    }
}
