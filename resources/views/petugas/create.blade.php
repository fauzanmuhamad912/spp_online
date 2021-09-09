@extends('layouts.appa')

@section('content')

<div class='container'>
    <div>
        <h3>Input Petugas</h3>
    </div>

    <form action="{{ route('petugas.store') }}" method="post">
    @method('POST')
    @csrf
        <div>
            <label for="username">Username</label><br>
            <input type="text" name="username" id=""  class="form-control" required autocomplete="off">
        </div>
        <br>
        <div>
            <label for="password">Password </label><br>
            <input type="text" name="password" id="" class="form-control" required autocomplete="off">
        </div>
        <br>
        <div>
            <label for="nama_petugas">Nama Petugas</label><br>
            <input type="text" name="nama_petugas" id="" class="form-control" required autocomplete="off">
        </div>
        <br>
        <div>
            <label for="level">Level</label><br>
            <select name="level" id="" class = "form-control">
                <option value="" disabled="disabled" selected>--pilih--</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <br>
        <div>
            <button type="submit" class ="btn btn-success">Tambahkan</button>
            <a href="{{route('petugas.index')}}" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>

@endsection

