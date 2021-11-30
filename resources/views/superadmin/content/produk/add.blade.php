@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.produk.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name"  class="form-control" placeholder="Nama Produk" required>

        </div>
        <div class="form-group">
            <label>Harga Produk</label>
            <input type="number" name="price"  class="form-control" placeholder="Harga Produk RP..." required>
        </div>
        <div class="form-group">
            <label>Stok Produk</label>
            <input type="number" name="stock"  class="form-control" placeholder="Banyaknya stok produk" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option disabled selected>Pilih kategori</option>
                @foreach($kategori as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <a href="{{route('superadmin.produk.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
