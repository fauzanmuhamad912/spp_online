<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;
use App\Models\User;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::all();

        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = Petugas::all();
        return view('petugas.create', compact('petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Petugas::create([
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        User::create([
            'name' => $request->nama_petugas,
            'email' => $request->username.'@gmail.com',
            'password' => Hash::make($request->password),
            'role' => $request->level,
        ]);

        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_petugas)
    {
        $petugas = Petugas::where('id_petugas', $id_petugas)->first();

        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_petugas)
    {
        $petugas = Petugas::where('id_petugas', $id_petugas);
        $petugas->update([
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        $user = User::where('name', $request->nama_petugas)
                    ->update([
                        'name' => $request->nama_petugas,
                        'email' => $request->username.'@gmail.com',
                        'password' => Hash::make($request->password),
                        'role' => $request->level,
                    ]);

        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_petugas)
    {
        Petugas::where('id_petugas', $id_petugas)
                ->delete();

        return back();
    }
}
