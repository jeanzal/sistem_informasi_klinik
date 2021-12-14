@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.rekam_medis.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" value="{{$rekam_medis->spesialis}}" class="form-control" placeholder="Nama Pasien" required>
        </div>
        <div class="form-group">
            <label>Biaya</label>
            <input type="number" name="biaya" value="{{$rekam_medis->biaya}}" class="form-control" placeholder="Biaya Penanganan .." required>
        </div>
        <div class="form-group">
            <label>Nama Dokter Spesialis</label>
            <select name="dokter_id" class="form-control">
                @foreach($dokter as $data)
                    <option value="{{$data->id}}">{{$data->nama_dokter}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$rekam_medis->id}}">
            <a href="{{route('superadmin.rekam_medis.index')}}" class="btn btn-dark btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
