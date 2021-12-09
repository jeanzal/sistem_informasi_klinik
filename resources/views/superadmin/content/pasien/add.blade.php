@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.pasien.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="name"  class="form-control" placeholder="Nama Pasien" required>
        </div>
        <div class="form-group">
            <label>Keluhan</label>
            <input type="text" name="keluhan"  class="form-control" placeholder="Keluhan Pasien" required>
        </div>
        <div class="row mb-3">
            <div>
            <label class="col-sm-2 col-form-label">Keterangan</label>    
            </div>
            <div class="col-sm-12">
                <select name="ket" class="form-control" required>
                    <option>--Pilih--</option>
                    <option value="Membeli Obat">Membeli Obat</option>
                    <option value="Rekam Medis">Rekam Medis</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <a href="{{route('superadmin.pasien.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
