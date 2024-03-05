<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'kategori_kode' => 'FOOD',
                'kategori_nama' => 'Makanan',
            ],
            [
                'kategori_kode' => 'DRINK',
                'kategori_nama' => 'Minuman',
            ],
            [
                'kategori_kode' => 'CLOTH',
                'kategori_nama' => 'Pakaian',
            ],
            [
                'kategori_kode' => 'ELEC',
                'kategori_nama' => 'Elektronik',
            ],
            [
                'kategori_kode' => 'HOUSE',
                'kategori_nama' => 'Perlengkapan Rumah Tangga',
            ],
        ];

        DB::table('m_kategori')->insert($data);
    }
}