<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'id'=>1,
                'name'=>'Admin',
                'email'=>"sadia1049@gmail.com",
                'cnic'=>"35202-4952095-6",
                'password'=>Hash::make("data123"),
                'address'=>"AWT",
                'role'=>"Admin",
                'profession'=>"Developer",
                'age'=>"24",
                'profile_picture'=>"",
            ],
        ];
        foreach($admin as $admin)
        {
            User::create($admin);
        }
    }
}
