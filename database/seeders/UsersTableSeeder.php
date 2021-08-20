<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'User1',
                'email' => 'user1@user.com',
                'token' => 'AVoyysShxGMWSmG8Zsje3Jj304qx4ocgacxpbow1DV2dzrJdeFnvjJ8Mwx7X',
                'email_verified_at' => NULL,
                'password' => '$2y$10$y0F6zJe.lU6gPYfK7A43l.G/NmaVnhLixeeAiuz1hoEJeU4uDHYYC',
                'remember_token' => NULL,
                'created_at' => '2021-08-20 13:11:12',
                'updated_at' => '2021-08-20 13:11:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User2',
                'email' => 'user2@user.com',
                'token' => 'kp2Q4zmIUbZNVEL1wPvXh5FYDOk8KcKfrGMG5DqlhEUSp9TGSrjApwqckVFn',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5plY3ZtbiHOvofuWWzZAGuOA34l84vgMsYNhv7nTGO8kVg1fRM7Ta',
                'remember_token' => NULL,
                'created_at' => '2021-08-20 13:11:25',
                'updated_at' => '2021-08-20 13:11:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'User3',
                'email' => 'user3@user.com',
                'token' => 'K72uyEDSZw7QRR9rvgui0xqEfDzixMy7d1fe4xs8F6mbAl8iWCRELd8OAKWE',
                'email_verified_at' => NULL,
                'password' => '$2y$10$T3LEty0ycXsRVWm3SGvOhuINYZ93XL0kknJap0i771wgNsQnEBofu',
                'remember_token' => NULL,
                'created_at' => '2021-08-20 13:11:40',
                'updated_at' => '2021-08-20 13:11:40',
            ),
        ));
        
        
    }
}