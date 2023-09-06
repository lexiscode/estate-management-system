<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();

        $admin->name = 'Admin User';
        $admin->email = 'admin@gmail.com';
        $admin->password = '$2y$10$h1kyVkBCj.fsLloT9hSou.mWGEMKSpvfuc..1N5YoI0XlsgZ5HETe'; //unlockme123

        $admin->save();
    }
}

