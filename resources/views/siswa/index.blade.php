@extends('layouts.appa')

@section('content')


<div class ="container">
    <div>
        <a href="{{route('siswa.create')}}" class ="btn btn-success sm">Input Siswa</a>
    </div>
    <br>
        <table class='table'>
            <tr>
                <td>NISN</td>
                <td>NIS</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>eAlamat</td>
                <td>No Telp</td>
                <td>Tahun SPP</td>
                <td>Nominal</td>
                <td>Action</td>
            </tr>
            @foreach($siswa as $a)
            <tr>
                <td>{{ $a->nisn }}</td>
                <td>{{ $a->nis }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->nama_kelas }}</td>
                <td>{{ $a->alamat }}</td>
                <td>{{ $a->no_telp }}</td>
                <td>{{ $a->tahun }}</td>
                <td>{{ $a->nominal }}</td>
                <td>
                    <form action="{{route('siswa.delete', $a->nisn)}}" method='post'>

                        @method('DELETE')
                        @csrf
                        <a href="{{route('siswa.edit', $a->nisn)}}" class="btn btn-info">Edit</a>

                        <button type="submit" class= "btn btn-danger" onclick="return confirm('Apakah ingin menghapus siswa ')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

</div>

@endsection

