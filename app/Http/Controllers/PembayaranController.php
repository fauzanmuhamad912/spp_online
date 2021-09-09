<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Vsiswa;
use App\Models\Vbayar;
use Auth;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Vbayar::all();

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function struk($id_pembayaran)
    {
        $struk = Vbayar::where('id_pembayaran', $id_pembayaran)->first();

        return view('pembayaran.struk', compact('struk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();

        return view('pembayaran.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = Vsiswa::where('nisn', $request->nisn)->first();
        $tr = Pembayaran::where('nisn', $request->nisn)->get();
        // $end = array_key_last(end($tr));
        // $tr = $tr[$end];
        // $tr = $siswa->tahun;
        // dd($tr);

        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September', 'Oktober', 'November', 'Desember'];
        $ttl = $request->bulan * $siswa->nominal;
        if (sizeof($tr) == 0) {
            $ib = 6;
            $tahun = $siswa->tahun;
        }else {
            $end = array_key_last(end($tr));
            $tr = $tr[$end];
            $ib = array_search($tr->bulan_dibayar, $bulan);
            
            // dd($ib);
            if ($ib == 11) {
                $ib = 0;
                $tahun = $tr->tahun_dibayar + 1;
            }else {
                $ib = $ib + 1;
                $tahun = $tr->tahun_dibayar;
            }

        }

        if ($request->jumlah_bayar < $siswa->nominal) {
            return redirect()->route('pembayaran.create')
            ->with('error', 'Jumlah yang harus anda bayar Rp. '.$siswa->nominal);
        }elseif ($request->jumlah_bayar < $ttl) {
            return redirect()->route('pembayaran.create')
            ->with('error', 'Uang anda kurang untuk membayar '.$request->bulan.' bulan');
        }
        else {
            for ($i=0; $i < $request->bulan; $i++){
                $siswa = Vsiswa::where('nisn', $request->nisn)->first();
                $tr = Pembayaran::where('nisn', $request->nisn)->get();
                $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September', 'Oktober', 'November', 'Desember'];
                $ttl = $request->bulan * $siswa->nominal;
                if (sizeof($tr) == 0) {
                    $ib = 6;
                    $tahun = $siswa->tahun;
                }else {
                    $end = array_key_last(end($tr));
                    $tr = $tr[$end];
                    $ib = array_search($tr->bulan_dibayar, $bulan);
                    
                    // dd($ib);
                    if ($ib == 11) {
                        $ib = 0;
                        $tahun = $tr->tahun_dibayar + 1;
                    }else {
                        $ib = $ib + 1;
                        $tahun = $tr->tahun_dibayar;
                    }

                }

                Pembayaran::create([
                    'id_petugas' => Auth::user()->id,
                    'nisn' => $request->nisn,
                    'tgl_bayar' => Carbon::now(),
                    'bulan_dibayar' => $bulan[$ib],
                    'tahun_dibayar' => $tahun,
                    'id_spp' => $siswa->id_spp,
                    'jumlah_bayar' => $request->jumlah_bayar,
                ]);
            }
        return redirect()->route('pembayaran.index');
        }
        
        
    }

    public function cari(Request $request)
    {
        $pembayaran = Vbayar::where('nis', $request->nis)->get();

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function getSiswa($nisn)
    {
        $siswa = Vbayar::where('nisn', $nisn)->get();
        $end = array_key_last(end($siswa));
        $da = $siswa[$end];

        $data = [
            'siswa' => $da,
            'hasil' => 'berhasil'
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function histori()
    {
        $a = Auth::user()->role;
        $n = Auth::user()->name;
        if ($a == "admin") {
            $htr = Vbayar::all();
        }elseif ($a == "petugas") {
            $htr = Vbayar::all();
        }elseif ($a == "siswa") {
            $htr = Vbayar::where('nama', $n)->get();
            // dd($htr);
        }

        return view('pembayaran.histori', compact('htr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
