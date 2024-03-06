<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    
    public function run()
    {
        $user = [
            [
           
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'phone_no' =>'0434343435',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
               
                'name'           => 'Sub Admin',
                'email'          => 'admin@gmail.com',
                'phone_no' =>'0934343421',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
               
                'name'           => 'Ko Ko',
                'email'          => 'koko@gmail.com',
                'phone_no' =>'0934343235',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
               
                'name'           => 'Mg Mg',
                'email'          => 'mgmg@gmail.com',
                'phone_no' =>'0934243435',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
               
                'name'           => 'Aye Aye',
                'email'          => 'aye@gmail.com',
                'phone_no' =>'0939343435',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($user);
    }
}
