<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use App\Exports\LaporanExport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            return view('admin');
        }elseif (Auth::user()->role == "petugas") {
            return view('petugas');
        }elseif (Auth::user()->role == "siswa") {
            return view('siswa');
        }else {
            return view('home');
        }
        
    }
    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');

    }
    }

