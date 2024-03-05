<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for ($i=1; $i <=10 ; $i++) 
       { 
        $data =[
            'barang_id' => $i, // Sesuaikan dengan jumlah dan id kategori yang ada
            'kategori_id' => rand(1, 5),
            'barang_kode' => 'BRG' . $i,
            'barang_nama' => 'Barang ' . $i,
            'harga_beli' => rand(1000, 5000), // Ganti dengan rentang harga yang sesuai
            'harga_jual' => rand(6000, 10000),
            ];
            DB::table('m_barang')->insert($data);
       }
    }
}
