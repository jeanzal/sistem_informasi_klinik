@extends('superadmin/layout/main')
@section('content')

    <div class="row justify-content-between">

        <div class="col-5 bg-white">
            <br>
            <h4>Daftar Obat</h4><br>
            <table class="table table-hover" id="productTable" >
                <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $row)
                    <tr>
                        <td class="product_id">{{$row->id}}</td>
                        <td class="product_name">{{$row->name}}</td>
                        <td class="product_price">{{$row->price}}</td>
                        <td>
                           <a href="#" class="addToCart btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-7 bg-white">
            <form action="{{route('superadmin.transaction.store')}}"method="post">
                @csrf
                <br>
                <h5>Pilih Pasien</h5><br>
                <div class="form-group">

                    <select name="pasien_id" class="form-control">
                        @foreach($pasien as $row)
                        @if($row->ket == "Membeli Obat")
                            <option value="{{$row->id}}">{{$row->name}} -- {{$row->ket}} -- {{$row->keluhan}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                    <p>&nbsp;</p>
                    <h4>Daftar Pembelian Obat</h4><br>
                    <table class="table table-hover" id="myTable">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">qty</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <input type="hidden" name="status" value="Blom Bayar">
                    <input type="hidden" name="ket" value="Membeli Obat">
                    <input type="hidden" name="pengguna_id" value="{{Auth::guard('superadmin')->user()->id}}">
                    <a href="{{route('superadmin.transaction.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan Transaksi</button>
            </form>

            </div>
    </div>
    <script>
       $(function (){
           delInit();
           var product_id = "";
           var product_name = "";
           var product_price = "";

           $('#productTable').on("click",".addToCart",function (){
              product_id = $(this).closest('tr').find('.product_id').text();
              product_name = $(this).closest('tr').find('.product_name').text();
              product_price = $(this).closest('tr').find('.product_price').text();


              var rowCount = $('#myTable tbody tr').length;
              var markup = "<tr>";
              markup += "<td>"+product_name+"</td>";
              markup += "<td>"+product_price+"</td>";

              markup += "<td>";
              markup += "<input type='number' name='send["+(rowCount+1)+"][product_qty]' value='1'>";
              markup += "<input type='hidden' name='send["+(rowCount+1)+"][product_id]' value="+product_id+">";
              markup += "</td>";

              markup += "<td><button type='button' class='delete-row btn btn-sm btn-danger'><i class='fa fa-trash-alt'></i> Hapus</button> </td>";

               markup +="</tr>";

               $('#myTable tbody ').append(markup);
               delInit();
           });

           function delInit(){
               $(".delete-row").click(function () {
                   $(this).parent().parent().remove();
               })
           }

       });
        </script>


@endsection
