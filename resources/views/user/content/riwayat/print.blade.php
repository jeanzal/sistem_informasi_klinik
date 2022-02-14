

    @php
     $total =0;
    @endphp

    <div class="text-center">
        <h3>LAPORAN DATA TRANSAKSI </h3>
    </div>

    <label>Transaksi Id: {{$transaction->id}}</label><br/>
    <label>Tanggal Transaksi: {{$transaction->date}}</label><br/>
    <label>Nama Pasien: {{$transaction->name}}</label><br>
    <label>Keterangan Transaksi : {{$transaction->ket}}</label>


    <p></p>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th >Harga satuan</th>
            <th >Banyaknya</th>
            <th >Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp

        @foreach($item as $row)
            @php
                $total +=$row->product_price * $row->qty;
                $subtotal = $row->product_price * $row->qty;
            @endphp

            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->product_name}}</td>
                <td>{{Helper::rupiah($row->product_price)}}</td>
                <td>{{$row->qty}}</td>
                <td>{{Helper::rupiah($subtotal)}}</td>

            </tr>
        @endforeach
            <tr>
                <td colspan="4" class="text-end"> <b> Total Bayar : </b></td>
                <td><b>{{Helper::rupiah($total)}}</b></td>
            </tr>
        </tbody>
    </table>


