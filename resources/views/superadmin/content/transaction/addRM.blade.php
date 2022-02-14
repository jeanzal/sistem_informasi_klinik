@extends('superadmin/layout/main')
@section('content')

    <div class="row justify-content-between">

        <div class="col-5 bg-white">
            <br>
            <h4>Daftar Penanganan Rekam Medis</h4><br>
            <table class="table table-hover" id="productTable" >
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Penanganan Spesialis</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rekam_medis as $row)
                    <tr>
                        <td class="rm_id">{{$row->id}}</td>
                        <td class="rm_spesialis">{{$row->spesialis}}</td>
                        <td class="rm_biaya">{{$row->biaya}}</td>
                        <td>
                           <a href="#" class="addToCart btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-7 bg-white">
            <form action="{{route('superadmin.transaction.trans_rm')}}"method="post">
                @csrf
                <br>
                <h5>Pilih Pasien</h5><br>
                <div class="form-group">

                    <select name="pasien_id" class="form-control">
                        @foreach($pasien as $row)
                        @if($row->ket == "Rekam Medis")
                            <option value="{{$row->id}}">{{$row->name}} -- {{$row->ket}} -- {{$row->keluhan}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                    <p>&nbsp;</p>
                    <h4>Daftar Rekam Medis Pasien</h4><br>
                    <table class="table table-hover" id="myTable">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Rekam Medis</th>
                            <th scope="col">Besar Biaya</th>
                            <th scope="col">Banyaknya Penanganan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <input type="hidden" name="status" value="Blom Bayar">
                    <input type="hidden" name="ket" value="Rekam Medis">
                    <input type="hidden" name="pengguna_id" value="{{Auth::guard('superadmin')->user()->id}}">
                    <a href="{{route('superadmin.transaction.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan Transaksi</button>
            </form>
            </div>
    </div>
    <script>
       $(function (){
           delInit();
           var rm_id = "";
           var rm_spesialis = "";
           var rm_biaya = "";

           $('#productTable').on("click",".addToCart",function (){
              rm_id = $(this).closest('tr').find('.rm_id').text();
              rm_spesialis = $(this).closest('tr').find('.rm_spesialis').text();
              rm_biaya = $(this).closest('tr').find('.rm_biaya').text();


              var rowCount = $('#myTable tbody tr').length;
              var markup = "<tr>";
              markup += "<td>"+rm_spesialis+"</td>";
              markup += "<td>"+rm_biaya+"</td>";

              markup += "<td>";
              markup += "<input type='number' name='send["+(rowCount+1)+"][rm_qty]' value='1'>";
              markup += "<input type='hidden' name='send["+(rowCount+1)+"][rm_id]' value="+rm_id+">";
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
