<html>
    <head>
        <title></title>
    </head>
    <body>
        <h3>Laporan Laundry</h3>
        <hr/>
        <table style="width:100%" border="1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Member</th>
                                <th>Nama Outlet</th>
                                <th>Tgl Masuk</th>
                                <th>Tgl Dikembalikan</th>
                                <th>Status</th>
                                <th>Status Pembayaran</th>

                            </tr>
                            <tbody>
                            @foreach($report as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->transaksi->member->nama }}</td>
                                    <td>{{ $row->transaksi->outlet->nama }}</td>
                                    <td>{{ $row->transaksi->tgl_masuk }}</td>
                                    <td>{{ $row->transaksi->batas }}</td>
                                    <td>{{ $row->transaksi->status}}</td>
                                    <td>{{ $row->transaksi->bayar }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </thead>
                    </table>
    </body>
</html>