<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalData = 30; // Total number of records
        $salesTransactions = 10; // Number of sales transactions
        $itemsPerTransaction = 3; // Number of items per transaction

        for ($i = 1; $i <= $totalData; $i++) {
            $penjualanId = ceil($i / $itemsPerTransaction); // Calculate sales transaction ID
            $barangId = rand(1, 3); // Randomly select barang_id

            $data = [
                'penjualan_id' => $penjualanId,
                'barang_id' => $barangId,
                'harga' => rand(1000, 5000), // Harga barang
                'jumlah' => rand(1, 10), // Jumlah barang terjual
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Memasukkan data ke dalam tabel t_penjualan_detail
            DB::table('t_penjualan_detail')->insert($data);
        }
    }
}
