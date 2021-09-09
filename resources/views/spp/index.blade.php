@extends('layouts.appa')

@section('content')


<div class ="container">
    <div>
        <a href="{{route('spp.create')}}" class ="btn btn-success sm">Input Spp</a>
    </div>
    <br>
        <table class='table'>
            <tr>
                <td>Id SPP</td>
                <td>Tahun</td>
                <td>Nominal</td>
                <td>Action</td>
            </tr>
            @foreach($spp as $a)
            <tr>
                <td>{{ $a->id_spp }}</td>
                <td>{{ $a->tahun }}</td>
                <td>{{ $a->nominal }}</td>
                <td>
                    <form action="{{route('spp.delete', $a->id_spp)}}" method='post'>

                        @method('DELETE')
                        @csrf
                        <a href="{{route('spp.edit', $a->id_spp)}}" class="btn btn-info">Edit</a>

                        <button type="submit" class= "btn btn-danger" onclick="return confrim('Apakah ingin menghapus spp?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

</div>

@endsection

