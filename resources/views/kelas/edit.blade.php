@extends('layouts.appa')

@section('content')

<div class='container'>
    <div>
        <h3>Edit Kelas</h3>
    </div>

    <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="post">
    @method('POST')
    @csrf
        <div>
            <label for="nama_kelas">Nama Kelas</label><br>
            <input type="text" name="nama_kelas" id="" value="{{$kelas->nama_kelas}}"  class="form-control" require>
        </div>
        <br>
        <div>
            <label for="kompetensi_keahlian">Kompetensi Keahlian</label><br>
            <input type="text" name="kompetensi_keahlian" value="{{$kelas->kompetensi_keahlian}}" id="" class="form-control" require>
        </div>
        <br>
        <div>
            <button type="submit" class ="btn btn-success">Tambahkan</button>
            <a href="{{route('kelas.index')}}" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>

@endsection