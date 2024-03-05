<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <=10 ; $i++) 
        { 
         $data =[
            'user_id' => 3, // Sesuaikan dengan jumlah dan id user yang ada
            'pembeli' => 'Pembeli ' . $i,
            'penjualan_kode' => 'PJL' . $i,
            'tanggal' => now(),
             ];
             DB::table('t_penjualan')->insert($data);
        }
    }
}
