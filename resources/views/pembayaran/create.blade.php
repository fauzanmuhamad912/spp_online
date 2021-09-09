@extends('layouts.app')

@section('content')

<div class='container'>
    <div>
        <h3>Pembayaran SPP</h3>
    </div>

    @if(session('success'))
        <div class="container">
            <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
         @endif
        <div class="container">
         @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
         @endif
         </div>

    <form action="{{route('pembayaran.store')}}" method="post">
    @method('POST')
    @csrf
        <div>
            <label for="id_petugas">Petugas</label><br>
            <input type="text" name="id_petugas" id=""  class = "form-control"value="{{Auth::user()->name}}" readonly>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <label for="nisn">Nama Siswa</label><br>
                <select name="nisn" id="nisn" class="form-control" class="js-example-basic-single"  onchange="getSiswa()">
                    <option value="" selected disabled="disabled">--Pilih Siswa--</option>
                    @foreach($siswa as $siswa)
                        <option value="{{$siswa->nisn}}">{{$siswa->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class = "col-3">
                <label for="nama">NISN Siswa</label>
                <input type="text" name="nama" id="nama" class="form-control" readonly>
            </div>
            <div class = "col-3">
                <label for="nominal">Nominal SPP</label>
                <input type="text" name="nominal" id="nominal" class="form-control" readonly>
            </div>
        </div>
        <br>
        <!-- <div>
            <label for="bulan_dibayar">Bulan Bayaran</label><br>
            <input type="text" name="bulan_dibayar" id="" class = "form-control">
            <select name="bulan_dibayar" id="" class="form-control">
                <option value="" selected disabled="disabled">-Pilih Bulan-</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>
        <br> -->
        <!-- <div>
            <label for="tahun_dibayar">Tahun Bayaran</label><br>
            <input type="number" name="tahun_dibayar" id="" class = "form-control">
        </div>
        <br> -->
        <div>
            <label for="ket">Terakhir Bayaran</label>
            <input type="text" name="ket" id="ket" class="form-control" readonly>
        </div>
        <br>
        <div>
            <label for="bulan">Banyak bayar Bulan</label>
            <input type="number" name="bulan" id="bulan" class="form-control">
        </div>
        <!-- <div>
            <label for="total_bayar">Total Bayar</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" readonly>
        </div> -->
        <div>
            <label for="jumlah_bayar">Jumlah Bayar</label><br>
            <input type="number" name="jumlah_bayar" id="" class = "form-control">
        </div>
        <br>
        <div>
            <button type="submit" class = "btn btn-success">Tambah</button>
            <a href="{{route('pembayaran.index')}}"  class ="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>

@endsection

<script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

</script>


<script>
        function getSiswa() {
            var nisn = $('#nisn').val();
            // alert(nisn);

            $.ajax({
                url:"{{ url('/getSiswa/') }}"+ '/' + nisn,
                type:"GET",
                success: function getSiswa(data) {
                console.log(data);

                    if(data['siswa'] == null){
                        $('#ket').val('Belum pernah bayar spp');
                    }
                    $('#ket').val(data['siswa']['bulan_dibayar']+'/'+data['siswa']['tahun_dibayar']);
                    $('#nominal').val('Rp. '+data['siswa']['nominal']);
                    $('#nama').val(data['siswa']['nisn']);
            }
        });
        }

</script>