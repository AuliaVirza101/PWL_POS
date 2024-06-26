<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //the eloquent function displays data using pagination
        $useri = m_user::all(); //Retrieve all content of a table
        return view('m_user.index', compact('useri'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('m_user.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
         'user_id' => 'max 20',
         'username' => 'required',
         'nama' => 'required',  
        ]);

        m_user::create($request->all());
        return redirect()->route('m_user.index')->with('success','user added succesfully');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $useri = m_user::find($id);
        return view('m_user.edit', compact('useri'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $useri = m_user::find($id);
        return view('m_user.edit',compact('useri'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required'
        ]);

        m_user::find($id)->update($request->all());
        return redirect()->route('m_user.index')->with('success','Data updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useri = m_user::findOrdfail($id)->delete();
        return \redirect()->route('m_user.index')->with('success','data deleted successfully');
        //
    }
}
