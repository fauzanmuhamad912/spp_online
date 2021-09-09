@extends('layouts.appa')

@section('content')


<div class ="container">
    <div>
        <a href="{{route('petugas.create')}}" class ="btn btn-success sm">Input Petugas</a>
    </div>
    <br>
        <table class='table'>
            <tr>
                <td>Id Petugas</td>
                <td>Username</td>
                <td>Password</td>
                <td>Nama Petugas</td>
                <td>Role/Level</td>
                <td>Action</td>
            </tr>
            @foreach($petugas as $a)
            <tr>
                <td>{{ $a->id_petugas }}</td>
                <td>{{ $a->username }}</td>
                <td>{{ $a->password }}</td>                
                <td>{{ $a->nama_petugas }}</td>                
                <td>{{ $a->level }}</td>
                <td>
                    <form action="{{route('petugas.delete', $a->id_petugas)}}" method='post'>

                        @method('DELETE')
                        @csrf
                        <a href="{{route('petugas.edit', $a->id_petugas)}}" class="btn btn-info">Edit</a>

                        <button type="submit" class= "btn btn-danger" onclick="return confrim('Apakah ingin menghapus petugas {{$a->nama_petugas}}?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

</div>

@endsection

