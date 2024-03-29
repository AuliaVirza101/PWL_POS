<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable){
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->update(['kategori_nama' => 'camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' .$row.' baris'; 
        
        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->delete();
        // return 'Delete data berhasil.Jumlah data yang dihapus: '. $row.' baris';
    
        // $data = DB::table("m_kategori")->get();
        // return view('kategori', ['data' => $data]);

        return $dataTable->render('kategori.index');
    }
    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){
        kategoriModel::create([
            'kategori_kode'=> $request->kodekategori,
            'kategori_nama'=> $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    public function update($id) {
        $data = KategoriModel::find($id);
        return view('kategori.update', ['kategori' => $data]);
    }

    public function update_save(Request $request, $id) {
        $data = KategoriModel::find($id);
        $data->kategori_kode = $request->kodeKategori;
        $data->kategori_nama = $request->namaKategori;
        $data->save();

        return redirect('/kategori');
    }

    public function delete($id) {
        $data = KategoriModel::find($id);
        $data->delete();

        return redirect('/kategori');
    }
}
