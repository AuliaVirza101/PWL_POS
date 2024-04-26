<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index(){
        // DB::insert('insert into m_level(level_kode,level_nama,created_at) values (?,?,?)', ['CUS', 'Pelanggan',now()]);
        // return "insert data baru berhasil";

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?',['Customer','CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: '. $row.' baris';
    
        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil.Jumlah data yang dihapus: '. $row.' baris';
    
        // $data = DB::select('select * from m_level');
        // return view('level',['data' => $data]);

        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level';
        $level = LevelModel::all();

        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'level' => $level]);
   
    }
    public function list(Request $request) {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('action', function ($level) {
                $btn = '<a href="'.url('/level/' . $level->level_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/level/' . $level->level_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/level/'.$level->level_id).'">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button></form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
   
    public function tambah(){
        return view ('level_tambah');
    }
    public function tambah_simpan(request $request){
        
        $validated = $request->validated();
        
        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        $validated = $request->safe()->except(['level_kode', 'level_nama']);
        
        LevelModel::create($validated);

        return redirect('/level');
    }
}
