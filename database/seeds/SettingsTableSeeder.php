<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            
            'site_name' => "Laravel's Blog",
            'Address' => "Bangladesh, Dhaka",
            'contact_number' => "88 089 5321 4905",
            'contact_email' => "info@laravel_blog.com"
        ]);
    }
}
