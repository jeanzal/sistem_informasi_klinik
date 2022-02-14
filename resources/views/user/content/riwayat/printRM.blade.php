

    @php
     $total =0;
    @endphp

    <div class="text-center">
        <h3>LAPORAN DATA TRANSAKSI </h3>
    </div>

    <label>Transaksi Id: {{$transaction->id}}</label><br/>
    <label>Tanggal Transaksi: {{$transaction->date}}</label><br/>
    <label>Nama Pasien: {{$transaction->name}}</label><br>
    <label>Keterangan Transaksi : {{$transaction->ket}}</label><br>


    <p></p>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th>No</th>
            <th>Diagnosa</th>
            <th>Dokter yang Menangani</th>
            <th>Biaya</th>
            <th>Banyak Penanganan</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp

        @foreach($item as $row)
            @php
                $total +=$row->biaya * $row->qty;
                $subtotal = $row->biaya * $row->qty;
            @endphp

            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->spesialis}}</td>
                <td>{{$row->nama_dokter}}</td>
                <td>{{Helper::rupiah($row->biaya)}}</td>
                <th class="text-center">{{$row->qty}}</th>
                <td>{{Helper::rupiah($subtotal)}}</td>

            </tr>
        @endforeach
            <tr>
                <td colspan="5" class="text-end"> <b> Total Bayar : </b></td>
                <td><b>{{Helper::rupiah($total)}}</b></td>
            </tr>
        </tbody>
    </table>


