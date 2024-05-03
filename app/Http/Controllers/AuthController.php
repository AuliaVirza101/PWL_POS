<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        //kita ambil data user lalu simpan pada variabel $user
        $user = Auth::user();

        //konidisi jika user nya ada
        if ($user) {
            //jika user nya memiliki level admin
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            }
            //jika user nya memiliki level manager 
            else if ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        //kita buat validasi pada saat tombol login di klik
        //validasi nya username dan password wajib diisi
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        //ambil data request username dan password saja
        $credential = $request->only('username','password');
        //cek jika data username dan password valid (sesuai) dengan data
        if (Auth::attempt($credential)) {

            //kalau berhasil simpan data user ya di variabel $user
            $user = Auth::user();

            //cek lagi jika level user admin maka arahkan ke halaman admin
            if ($user->level_id == '1') {
                //dd($user->level_id);
                return redirect()->intended('admin');
            } 
            //tapi jika level user nya user biasa maka arahkan ke halaman user
            else if ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
            //jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }
        //jika ga ada data user yang valid maka kembalikan lagi ke halaman login
        //pastikan kirim pesan error juga kalau login gagal ya
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukan sudah benar']);
    }

    public function register()
    {
        //tampilkan view register
        return view('register');
    }

    //aksi form register
    public function proses_register(Request $request)
    {
        //kita buat validasi buat proses register
        //validasinya yaitu semua field wajib diisi
        //validasi username harus unique 
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:m_user',
            'password' => 'required',
        ]);
        // kalau gagal kemnbali ke halaman register dengan munculkan pesan error
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request['password']);

        //masukkan semua data pada request ke table user
        UserModel::create($request->all());

        // jika berhasil arahkan ke halaman login
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        //logout menghapus session
        $request->session()->flush();

        //jalan kan juga fungsi logout pada auth
        Auth::logout();
        //kembali ke halaman login
        return redirect('login');
    }
}