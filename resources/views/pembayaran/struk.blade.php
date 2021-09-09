@extends('layouts.app')

@section('content')
<div class="container" onclick="print()">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Struk Pembayaran SPP') }}</div>

                <div class="card-body">
                <center>STRUK PEMBAYARAN SPP<br>
    SMK WIKRAMA 1 GARUT
    </center>
    <br>    
    <table class = "table">
        <tr>
            <td>Id Pembayaran</td>        
            <td>{{$struk->id_pembayaran}}</td>
        </tr>
        <tr>
            <td>Nama Petugas</td>        
            <td>{{$struk->nama_petugas}}</td>
        </tr>
        <tr>
            <td>NISN</td>        
            <td>{{$struk->nisn}}</td>
        </tr>
        <tr>
            <td>Nama Siswa</td>        
            <td>{{$struk->nama}}</td>
        </tr>
        <tr>
            <td>Nama Kelas</td>        
            <td>{{$struk->nama_kelas}}</td>
        </tr>
        <tr>
            <td>Kompetensi Keahlian</td>        
            <td>{{$struk->kompetensi_keahlian}}</td>
        </tr>
        <tr>
            <td>Nominal SPP</td>        
            <td>{{$struk->nominal}}</td>
        </tr>
        <tr>
            <td>Bulan Bayar</td>        
            <td>{{$struk->bulan_dibayar}}</td>
        </tr>
        <tr>
            <td>Tahun Bayar</td>        
            <td>{{$struk->tahun}}</td>
        </tr>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

