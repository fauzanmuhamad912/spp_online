@extends('layouts.app')

@section('content')


<div class ="container">
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
            </tr>
            @foreach($htr as $a)
            <tr>
                <td>{{ $a->id_pembayaran }}</td>
                <td>{{ $a->nisn }}</td>
                <td>{{ $a->tgl_bayar }}</td>
                <td>{{ $a->bulan_dibayar }}</td>
                <td>{{ $a->tahun_dibayar }}</td>
                <td>{{ $a->tahun }}</td>
                <td>{{ $a->nominal }}</td>
                <td>{{ $a->jumlah_bayar }}</td>
            </tr>
            @endforeach
        </table>

</div>

@endsection

