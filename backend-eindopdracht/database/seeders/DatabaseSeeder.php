<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'       => 'Admin',
            'username'   => 'admin',
            'email'      => 'admin@ehb.be',
            'password'   => Hash::make('Password!321'),
            'is_admin'   => true,
            'bio'        => 'Official Tomorrowland administrator.',
        ]);

        User::create([
            'name'     => 'Test Visitor',
            'username' => 'visitor',
            'email'    => 'visitor@tomorrowland.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'bio'      => 'Festival fan and lover of electronic music.',
            'birthday' => '1995-07-15',
        ]);

        $this->call([
            CategorySeeder::class,
            FaqCategorySeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
