<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;

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

        // return $dataTable->render('kategori.index');

        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori';

        return view('category.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request) {
        $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function ($kategori) {
                $btn = '<a href="'.url('/category/' . $kategori->kategori_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/category/' . $kategori->kategori_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/category/'.$kategori->kategori_id).'">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button></form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'kategori_kode' => 'required',
            'kategori_nama' => 'required',
        ]);
        

        KategoriModel::create($validated);
        return redirect('/kategori');
    }

    public function update($id) {
        $data = KategoriModel::find($id);
        return view('kategori/update', ['kategori' => $data]);
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
