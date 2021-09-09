@extends('layouts.appa')

@section('content')

<div class='container'>
    <div>
        <h3>Input siswa</h3>
    </div>

    <form action="{{ route('siswa.store') }}" method="post">
    @method('POST')
    @csrf
        <div class="row">
            <div class="col-6">
                <label for="nisn">NISN </label><br>
                <input type="text" name="nisn" id=""  class="form-control" require>
            </div>
            <div class="col-6">
                <label for="nis">NIS </label><br>
                <input type="text" name="nis" id="" class="form-control" require>
            </div>
        </div>
        <div>
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" id="" class="form-control" require>
        </div>
        <br>
        <div>
            <label for="id_kelas">Kelas</label><br>
            <select name="id_kelas" id="" class="form-control">
                <option value="" ddisabled="disabled" selected>--Pilih Kelas--</option>
                @foreach($kelas as $kelas)
                <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="alamat">Alamat</label><br>
            <input type="text" name="alamat" id="" class="form-control" require>
        </div>
        <br>
        <div>
            <label for="no_telp">No Telp</label><br>
            <input type="text" name="no_telp" id="" class="form-control" require>
        </div>
        
        <br>
        <div>
            <label for="id_spp">SPP</label><br>
            <select name="id_spp" id="" class="form-control">
                <option value="" disabled="disabled" selected>--Pilih Tahun--</option>
                @foreach($spp as $spp)
                <option value="{{$spp->id_spp}}">{{$spp->tahun}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <button type="submit" class ="btn btn-success">Tambahkan</button>
            <a href="{{route('siswa.index')}}" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>

@endsection