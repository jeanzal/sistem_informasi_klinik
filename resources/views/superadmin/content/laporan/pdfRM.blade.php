<div class="text-center">
        <h3>LAPORAN SEMUA DATA TRANSAKSI REKAM MEDIS </h3>
    </div>
    <p></p>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pasien</th>
                <th>Status</th>
                <th>Keterangan Transaksi</th>
                <th>Petugas PenanggungJawab</th>
            </tr>
        </thead>
        <tbody>
        @php
            $no=1;
        @endphp
        @foreach($transaction as $data)
            @if($data->ket == "Rekam Medis")
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->nama_pasien}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->ket}}</td>
                <td>{{$data->nama_pengguna}}</td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>