<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    // $user = UserModel::find(1);
    // $user = userModel::where('level_id', 1)->first();
    //$user= UserModel::firstWhere('level_id',1);

    // $user= UserModel::findOr(1,['username','nama'],function(){
    //     abort(404);
    // });

    // $user= UserModel::findOr(20,['username','nama'],function(){
    //     abort(404);
    // });

    // $user= UserMOdel::findOrdFail(1);

    // $user = USerMOdel::where('username','manager9')->firstOrFail();
    // $user = UserModel::where('level_id',2)->count();
    // dd($user);
    
    // $user = userModel::fisrtorCreate(
    //     [
    //         'username' => 'manager',
    //         'nama' => 'manager',
    //     ],
    // );

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager22',
    //         'nama'=>'manager Dua Dua',
    //         'password' => Hash::make('12345'),
    //         'level_id'=> 2
    //     ],
    //  );
     
    // $user = userModel::firstOrNew(
    //     [
    //         'username' => 'manager',
    //         'nama' => 'manager',
    //     ],
    // );

    // $user = UserModel::firstOrNew(
    //     [
    //         'username' => 'manager33',
    //         'nama'=>'manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id'=> 2
    //     ],
    //  );
    // $user->save(); 
    
    // $user = UserModel::create([
    //     'username' => 'manager55',
    //     'nama' => 'Manager55',
    //     'password' => Hash::make('12345'),
    //     'level_id'=> 2,
    // ]);

    // $user ->username= 'manager56';

    // $user->isDirty();//true
    // $user->isDirty('username');//true
    // $user->isDirty('nama');//false
    // $user->isDirty(['nama','username']);//true
    
    // $user->isClean();//false
    // $user->isClean('username');//false
    // $user->isClean('nama');//true
    // $user->isClean(['nama','username']);//false

    // $user -> save();
    // $user->isDirty();//false
    // $user->isClean();//true
    // dd($user->isDirty());

        
    return view('user', ['data'=>$user]);
    
}
}