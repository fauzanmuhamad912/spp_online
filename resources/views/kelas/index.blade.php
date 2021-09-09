@extends('layouts.appa')

@section('content')


<div class ="container">
    <div>
        <a href="{{route('kelas.create')}}" class ="btn btn-success sm">Input Kelas</a>
    </div>
    <br>
        <table class='table'>
            <tr>
                <td>Id Kelas</td>
                <td>Nama Kelas</td>
                <td>Kompetensi Keahlian</td>
                <td>Action</td>
            </tr>
            @foreach($kelas as $a)
            <tr>
                <td>{{ $a->id_kelas }}</td>
                <td>{{ $a->nama_kelas }}</td>
                <td>{{ $a->kompetensi_keahlian }}</td>
                <td>
                    <form action="{{route('kelas.delete', $a->id_kelas)}}" method='post'>

                        @method('DELETE')
                        @csrf
                        <a href="{{route('kelas.edit', $a->id_kelas)}}" class="btn btn-info">Edit</a>

                        <button type="submit" class= "btn btn-danger" onclick="return confrim('Apakah ingin menghapus Kelas '.{{ $a->nama_kelas }}.' , Kompetensi '.{{$a->kompetensi_keahlian}})">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

</div>

@endsection

