<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <=10 ; $i++) 
       { 
        $data =[
            'stok_id' => $i, // Sesuaikan dengan jumlah dan id barang yang ada
            'barang_id' => $i, // Sesuaikan dengan jumlah dan id barang yang ada
            'user_id' => rand(1, 3), // Sesuaikan dengan jumlah dan id user yang ada
            'stok_tanggal' => now(),
            'stok_jumlah' => rand(10, 50), // Ganti dengan rentang jumlah stok yang sesuai    
            ];
            DB::table('t_stok')->insert($data);
       }
    }
}
