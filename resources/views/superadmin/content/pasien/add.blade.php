@extends('superadmin/layout/main')
@section('content')

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pasien</h6>
            </div>
            <div class="card-body">
                <form action="{{route('superadmin.pasien.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="name"  class="form-control" placeholder="Nama Pasien" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Keluhan</label>
                        <input type="text" name="keluhan"  class="form-control" placeholder="Keluhan Pasien" required>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-12">Keterangan</label>    
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
                        <button type="submit" onclick = "return confirm('Apakah anda sudah membuat akun login peserta ? Jika sudah, klik Oke')" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buat Akun Pasien</h6>
            </div>
        <div class="card-body">
            <form action="{{route('superadmin.pasien.tambah_user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control"placeholder="Nama Pasien" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email Pasien</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" placeholder="Email Pasien" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input type="hidden" name="image" value="user.png">
                        <input type="hidden" name="role" value="user">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Buat Akun</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
