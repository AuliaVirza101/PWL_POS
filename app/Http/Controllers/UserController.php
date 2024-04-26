<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    $breadcrumb=(object)[
        'title' => 'Daftar User',
        'list' => ['Home','User']
    ];

    $page = (object)[
        'title' => 'Daftar user yang terdaftar dalam sistem'
    ];

    $activemenu = 'user';//set menu yang sedang aktif
    
    // Mendapatkan data level
    $levels = LevelModel::all();

    //Mengirimkan data ke view
    return view('user.index', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activeMenu' => $activemenu,
        'level' => $levels // Mengirimkan data level ke view
    ]);
}

public function create(){

    $breadcrumb=(object)[
        'title' => 'Daftar User',
        'list' => ['Home','User']
    ];

    $page = (object)[
        'title' => 'Daftar user yang terdaftar dalam sistem'
    ];

    $activemenu = 'user';//set menu yang sedang aktif
    
    // Mendapatkan data level
    $levels = LevelModel::all();

    return view('user.create', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activeMenu' => $activemenu,
        'level' => $levels // Mengirimkan data level ke view
    ]);
}

public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail user',
        ];

        $activeMenu = 'user';
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);


    }
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user',
        ];

        $activeMenu = 'user';

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }
    public function destroy(string $id)
    {
        $check = UserModel::find($id);

        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

public function list(Request $request) {
    $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');

    if ($request->level_id) {
        $users->where('level_id', $request->level_id);
    }

    return DataTables::of($users)
        ->addIndexColumn()
        ->addColumn('action', function ($user) {
            $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'.url('/user/'.$user->user_id).'">'
                . csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button></form>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
}

public function tambah(){
    return view ('user_tambah');
}
public function tambah_simpan(Request $request){ 
    // $validated = $request->validate([
    //     'username' => 'required',
    //     'nama' => 'required',
    //     'password' => 'required',
    //     'level_id' => 'required',
    // ]); 
    // $validated = $request->safe()->only(['username', 'nama','password','level_id']);
    
    // $validated = $request->safe()->except(['username', 'nama','password','level_id']);
    //    $data = $request->only(['username', 'nama', 'password', 'level_id']);
    // UserModel::create($validated);
    // UserModel::create($data);

    $level = $request->level_id;
    echo $level;
    
    // return redirect('/user');

}

public function ubah($id){
    $user = UserModel::find($id);
    return view('user_ubah',['data' => $user]);
}

public function ubah_simpan($id,Request $request){
    $user = userModel::find($id);

    $user->username= $request->username;
    $user->nama= $request->nama;
    $user->level_id = $request->level_id;

    $user->save();
    return redirect('/user');
}

public function hapus($id){
    $user = UserModel::find($id);
    $user->delete();
    
    return redirect('/user');
}
}