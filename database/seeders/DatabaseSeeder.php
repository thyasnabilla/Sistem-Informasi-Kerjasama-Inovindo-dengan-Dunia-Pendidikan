<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Admin;
use App\Models\Institusi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Perusahaan::create([
            'nama_perusahaan' => 'PT. Inovindo Digital Media',
            'alamat_perusahaan' => 'Komplek Buana Citra Ciwastra blok c.15 jln.Batusari no.27 Buah Batu Bojongsoang',
            'nama_pimpinan' => 'Doni Romdoni',
            'telepon' => '+628562251196',
            'logo' => 'logo.png',
            'website' => 'https://inovindo.co.id'
        ]);

        Admin::create([
            'nama_admin' => 'Icha Putri',
            'email' => 'ichaputri@gmail.com',
            'password' => '$2a$12$fWSyXb/e9RIUukMYhYmXIuTab8g14/0bz2JZ0N5jdPs32R78pnqT.' 
        ]);

        Institusi::create([
            'nama_institusi' => 'SMK YPC Tasikmalaya',
            'nama_pimpinan' => 'Ujang Sanusi',
            'province_id' => '11',
            'regencie_id' => '1101',
            'district_id' => '1101010',
            'village_id' => '1101010001',
            'user_id' => '2',
            'telepon' => '0265546717',
            'logo' => 'image/pR2DAOPgXqJmFnciawvQDCV8YtTooMK3dJWRyS7u.png',
            'website' => 'https://smk-tasikmalaya.sch.id',
            'email' => 'smkypctasikmalaya@gmail.com',
            'password' => '1101010001'
        ]);

        User::create([
            'email' => 'smkypctasikmalaya@gmail.com',
            'password' => '$2y$10$ykaU/nSycxqLf9HFH6ZFtucdHmNMiX5x2TP2prETdU3qqaVpT/0ZG'
        ]);
    }
}
