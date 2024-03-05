<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    $data=[
        'nama' => 'Pelanggan', 
    ];
    UserModel::where('username','customer-1')->update($data);

    $user = UserModel::all();//ambil semua data dari tael m_user
    return view('user', ['data'=>$user]);
}
}