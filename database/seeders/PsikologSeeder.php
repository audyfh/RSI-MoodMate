<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Psikolog;

class PsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Psikolog::create([
            'nama' => 'Yanto',
            'tempat_kerja' => 'Tulip Psikologi Riau',
            'alamat' => 'Jl. Melati No.5, Pekanbaru',
            'nomor_telepon' => '081234567890',
            'email' => 'yanto@tulip.com',
            'foto' => 'yanto.png' // Menyimpan nama file foto
        ]);

        Psikolog::create([
            'nama' => 'Rheza',
            'tempat_kerja' => 'POLDA Psikologi Depok',
            'alamat' => 'Jl. Raya Depok No.10, Depok',
            'nomor_telepon' => '081234567891',
            'email' => 'rheza@polda-depok.com',
            'foto' => 'rheza.png'
        ]);

        Psikolog::create([
            'nama' => 'Audy',
            'tempat_kerja' => 'Batu Psikologi Malang',
            'alamat' => 'Jl. Tugu No.7, Malang',
            'nomor_telepon' => '081234567892',
            'email' => 'audy@batu-malang.com',
            'foto' => 'audy.png'
        ]);

        Psikolog::create([
            'nama' => 'Dhafin',
            'tempat_kerja' => 'Kantor Psikologi Vincent',
            'alamat' => 'Jl. Kartini No.3, Jakarta',
            'nomor_telepon' => '081234567893',
            'email' => 'dhafin@vincent.com',
            'foto' => 'dhafin.png'
        ]);

        Psikolog::create([
            'nama' => 'Atha',
            'tempat_kerja' => 'Pawon Ayu Kartasura',
            'alamat' => 'Jl. Kartasura No.9, Solo',
            'nomor_telepon' => '081234567894',
            'email' => 'atha@pawon-ayu.com',
            'foto' => 'atha.png'
        ]);

        Psikolog::create([
            'nama' => 'Naufal',
            'tempat_kerja' => 'UI Psikologi Sentul',
            'alamat' => 'Jl. Raya Sentul No.5, Bogor',
            'nomor_telepon' => '081234567895',
            'email' => 'naufal@ui-sentul.com',
            'foto' => 'naufal.png'
        ]);

        Psikolog::create([
            'nama' => 'Bram',
            'tempat_kerja' => 'Kue Psikologi Semarang',
            'alamat' => 'Jl. Pandanaran No.11, Semarang',
            'nomor_telepon' => '081234567896',
            'email' => 'bram@kue-semarang.com',
            'foto' => 'bram.png'
        ]);
    }
}
