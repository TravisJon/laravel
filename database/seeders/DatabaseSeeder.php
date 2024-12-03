<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = [
            [
                'nama' => 'Admin',
            ],
            [
                'nama' => 'Teknisi',
            ],
        ];

        foreach ($role as $roles) {
            Role::create($roles);
        }

        $data = [
            [
                'nama' => 'Yoga',
                'email' => 'yoga@admin.test',
                'password' => bcrypt('yoga'),
                'role_id' => 1,
            ],
            // [
            //     'nama' => 'Teknisi 1',
            //     'email' => 'teknisi1@teknisi1.test',
            //     'password' => bcrypt('teknisi1'),
            //     'role_id' => 2,
            // ],
            // [
            //     'nama' => 'Teknisi 2',
            //     'email' => 'teknisi2@teknisi2.test',
            //     'password' => bcrypt('teknisi2'),
            //     'role_id' => 2,
            // ],
        ];

        foreach ($data as $user) {

            User::create($user);
        }
    }
}
