@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.rekam_medis.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis"  class="form-control" placeholder="Spesialis Bagian .." required>

        </div>
        <div class="form-group">
            <label>Biaya</label>
            <input type="number" name="biaya"  class="form-control" placeholder="Jumlah Biaya Peananganan" required>
        </div>
        <div class="form-group">
            <label>Nama Dokter Spesialis</label>
            <select name="dokter_id" class="form-control">
                <option disabled selected>Pilih Dokter</option>
                @foreach($dokter as $data)
                    <option value="{{$data->id}}">{{$data->nama_dokter}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <a href="{{route('superadmin.rekam_medis.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
