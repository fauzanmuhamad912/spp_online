@extends('layouts.appa')

@section('content')

<div class='container'>
    <div>
        <h3>Input Kelas</h3>
    </div>

    <form action="{{route('kelas.store')}}" method="post">
    @method('POST')
    @csrf
        <div>
            <label for="nama_kelas">Nama Kelas</label><br>
            <input type="text" name="nama_kelas" id=""  class="form-control" require autocomplete="off"> 
        </div>
        <br>
        <div>
            <label for="kompetensi_keahlian">Kompetensi Keahlian</label><br>
            <input type="text" name="kompetensi_keahlian" id="" class="form-control" require autocomplete="off">
        </div>
        <br>
        <div>
            <button type="submit" class ="btn btn-success">Tambahkan</button>
        </div>
    </form>
</div>

@endsection