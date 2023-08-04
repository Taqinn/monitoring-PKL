<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void 
    {
        $userData=[
            [
                'name' => 'instansi',
                'email' => 'instansi@gmail.com',
                'gender' => 'L',
                'role' => 'instansi',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'nis'=> '21332565',
                'kelas'=> 'XI',
                'gender' => 'L',
                'role' => 'siswa',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'guru',
                'email' => 'guru@gmail.com',
                'gender' => 'P',
                'role' => 'guru',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'admin',
                'email'=> 'admin@gmail.com',
                'gender' => 'L',
                'role' => 'admin',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'panitia',
                'email'=> 'panitia@gmail.com',
                'gender' => 'L',
                'role' => 'panitia',
                'password' => bcrypt('12345678')
            ],
        ];
        
        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
