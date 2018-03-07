<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
            
            'name' => 'Nazrul Islam Hasib',
            'email' => 'Nazrul@islam.com',
            'password' => bcrypt('password'),
            'admin' => 1

        ]);

        App\Profile::create([
            
            'user_id' => $user->id,
            'avatar' =>'uploads/avatars/jigsaw.ico',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aliquam, optio voluptatibus! Aliquid modi distinctio vitae, neque necessitatibus est soluta saepe rem qui quaerat atque quae temporibus quod, cupiditate non.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'

        ]);
    }
}
