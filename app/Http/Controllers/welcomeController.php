<?php
namespace App\Http\Controllers;

Class WelcomeController extends Controller
{
    public Function index()
    {
        $breadcrumb = (object)[
            'title' => 'selamat Datang',
            'list' => ['Home','Welcome']
        ];

        $activeMenu ='dashboard';

        return view('welcome', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
