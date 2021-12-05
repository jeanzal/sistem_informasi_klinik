@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.produk.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nama Pasien" required>
        </div>
        <div class="form-group">
            <label>Harga Produk</label>
            <input type="number" name="price" value="{{$product->price}}" class="form-control" placeholder="Harga Produk RP" required>
        </div>
        <div class="form-group">
            <label>Stok Produk</label>
            <input type="number" name="stock" value="{{$product->stock}}" class="form-control" placeholder="Banyaknya stok produk" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                @foreach($kategori as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$product->id}}">
            <a href="{{route('superadmin.produk.index')}}" class="btn btn-dark btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
