@extends('layouts.appa')

@section('content')

<div class='container'>
    <div>
        <h3>Input SPP</h3>
    </div>

    <form action="{{route('spp.store')}}" method="post">
    @method('POST')
    @csrf
        <div>
            <label for="tahun">Tahun SPP</label><br>
            <input type="text" name="tahun" id=""  class="form-control" require>
        </div>
        <br>
        <div>
            <label for="nominal">Nominal SPP</label><br>
            <input type="text" name="nominal" id="" class="form-control" require>
        </div>
        <br>
        <div>
            <button type="submit" class ="btn btn-success">Tambahkan</button>
        </div>
    </form>
</div>

@endsection