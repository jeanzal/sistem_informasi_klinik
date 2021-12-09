@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.dokter.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" value="{{$dokter->nama_dokter}}" class="form-control" placeholder="Nama Dokter" required>

        </div>
        <div class="form-group">
            <div>
                <label>Spesialis</label>
            </div>
            <select name="spesialis" class="form-control" required>
                <option value="Ahli Bedah" {{$dokter->spesialis === "Ahli Bedah" ? "selected" : ""}}>Ahli Bedah</option>
                <option value="Dokter Umum" {{$dokter->spesialis === "Dokter Umum" ? "selected" : ""}}>Dokter Umum</option>
                <option value="Anak" {{$dokter->spesialis === "Anak" ? "selected" : ""}}>Anak</option>
                <option value="Penyakit Dalam" {{$dokter->spesialis === "Penyakit Dalam" ? "selected" : ""}}>Penyakit Dalam</option>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$dokter->id}}">
            <a href="{{route('superadmin.dokter.index')}}" class="btn btn-dark btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
