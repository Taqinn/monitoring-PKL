<?php

namespace Database\Seeders;

use App\Models\Tempatpkl;
use Illuminate\Database\Seeder;

class TempatpklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $userData = [
            [
                'nama' => 'siswa',
                'jurusan' => 'TKJ',
                'kelas' => 'XI',
                'gender' => 'L',
                'instansi' => 'Asus'
            ],
        ];

        foreach ($userData as $key => $val){
            Tempatpkl::create($val);
        }
    }
}
