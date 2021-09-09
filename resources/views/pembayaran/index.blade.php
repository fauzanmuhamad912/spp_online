@extends('layouts.app')

@section('content')


<div class ="container">
    <div>
    
    <a href="{{route('pembayaran.create')}}" class ="btn btn-success sm">Tambah Pembayaran</a>
    <br>
        <form action="{{route('cari')}}" method="get">
        <input type="number" name="nis" id="" >

        <button type="submit" class = "btn">Cari</button>
        <a href="{{route('pembayaran.index')}}" class="btn btn-warning">Kembali</a>
        </form>
    </div>
    <br>
        <table class='table'>
            <tr>
                <td>Id Pembayaran</td>
                <td>NISN</td>
                <td>Tanggal Bayar</td>
                <td>Bulan Bayar</td>
                <td>Tahun Bayar</td>
                <td>Tahun Spp</td>
                <td>Nominal Spp</td>
                <td>Jumlah Bayar</td>
                <td>Struk</td>
            </tr>
            @foreach($pembayaran as $a)
            <tr>
                <td>{{ $a->id_pembayaran }}</td>
                <td>{{ $a->nisn }}</td>
                <td>{{ $a->tgl_bayar }}</td>
                <td>{{ $a->bulan_dibayar }}</td>
                <td>{{ $a->tahun_dibayar }}</td>
                <td>{{ $a->tahun }}</td>
                <td>{{ $a->nominal }}</td>
                <td>{{ $a->jumlah_bayar }}</td>
                <td>
                    <a href="{{route('pembayaran.struk', $a->id_pembayaran)}}" target="_blank" class="btn btn-info">cetak</a>
                </td>
            </tr>
            @endforeach
        </table>
        <br>
        <div>
        <a href="{{route('export')}}" class="btn btn-warning">download laporan</a>
        
        </div>

</div>

@endsection

