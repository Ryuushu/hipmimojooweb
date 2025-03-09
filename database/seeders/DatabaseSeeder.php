<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $divisi = [
            ['bidang' => 'Bidang I', 'nama_devisi' => 'Organisasi, Keanggotaan dan Kaderisasi'],
            ['bidang' => 'Bidang II', 'nama_devisi' => 'Keuangan, Perbankan dan Perencanaan Pembangunan'],
            ['bidang' => 'Bidang III', 'nama_devisi' => 'ESDM, Lingkungan Hidup dan Kehutanan'],
            ['bidang' => 'Bidang IV', 'nama_devisi' => 'Perindustrian dan Perdagangan'],
            ['bidang' => 'Bidang V', 'nama_devisi' => 'Sinergitas BUMN dan BUMDES'],
            ['bidang' => 'Bidang VI', 'nama_devisi' => 'Maritim, Kelautan dan Perikanan'],
            ['bidang' => 'Bidang VII', 'nama_devisi' => 'Pangan, Pertanian dan Perkebunan'],
            ['bidang' => 'Bidang VIII', 'nama_devisi' => 'Pariwisata, Ekonomi Kreatif dan Infokom'],
            ['bidang' => 'Bidang IX', 'nama_devisi' => 'UMKM, Koperasi dan Kewirausahaan'],
            ['bidang' => 'Bidang X', 'nama_devisi' => 'Infrastruktur Tata Ruang, Properti dan Perhubungan'],
            ['bidang' => 'Bidang XI', 'nama_devisi' => 'Pendidikan, Riset, Inovasi, Ketenagakerjaan, Kesehatan, Pemuda dan Olahraga'],
            ['bidang' => 'Bidang XII', 'nama_devisi' => 'Organisasi, Keanggotaan dan Investasi dan Kerjasama Antar DaerahKaderisasi'],
            ['bidang' => 'Dewan Pembina', 'nama_devisi' => 'Dewan Pembina'],
            ['bidang' => 'Dewan Kehormatan', 'nama_devisi' => 'Dewan Kehormatan'],
        ];
        DB::table('divisi')->insert($divisi);
    }
}
