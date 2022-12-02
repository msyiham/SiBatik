<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userAdministrator = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ],[
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'telepon' => '085769782106',
            'password' => bcrypt('123456789'),
            'alamat' => 'Malang',
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $userAdministrator->assignRole(User::ROLE_ADMIN);
    }
}