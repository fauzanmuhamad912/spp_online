<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vsiswa;
use App\Models\User;
use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Vsiswa::all();

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spp = Spp::all();
        $kelas = Kelas::all();

        return view('siswa.create', compact('spp', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);
        User::create([
            'name' => $request->nama,
            'email' => $request->nis.'@gmail.com',
            'password' => Hash::make($request->nis),
            'role' => 'siswa',
        ]);

        return redirect()->route('siswa.index');
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
    public function edit($nisn)
    {
        $spp = Spp::all();
        $kelas = Kelas::all();
        $siswa = Vsiswa::where('nisn', $nisn)->first();

        return view('siswa.edit', compact('siswa', 'spp', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $nisn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {

        Siswa::where('nisn', $nisn)->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);
        User::where('name', $request->name)->update([
            'name' => $request->nama,
            'email' => $request->nis.'@gmail.com',
            'password' => Hash::make($request->nis),
            'role' => 'siswa',
        ]);

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nisn
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        $siswa1 = Siswa::where('nisn', $nisn)->get()
                        ->pluck('nama');
        
        Siswa::where('nisn', $nisn)->delete();
        User::where('name', $siswa1)->delete();
        // dd($user);
        return back();
    }
}
