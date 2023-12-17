<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin123');
        $user->status = 'approved';
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'Test user';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('user123');
        $user->status = 'approved';
        $user->role = 'normal_user';
        $user->save();
    }
}
