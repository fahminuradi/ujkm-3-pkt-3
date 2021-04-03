@extends('layouts.star')
@section('title')
Report Laundry
@endsection

@section('content')


<div class="col-lx-12 col-lg-12">
    <div class="card shadow mb-12">
        <div class="card-header border-left-info">
            <a target="_blank" href="{{ route('cetak_pdf') }}" class="btn btn-success">PDF</a>  
            
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-2 ">
    <div class="card shadow mb-12 border-left-info">
        <div class="card-body">
            <div class="box-body">
            <table class="table table-bordered">
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
                                    <td>{{ $loop->iteration + ($report->perPage() * ($report->currentPage() - 1 )) }}</td>
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
                    {{ $report->links() }}
            </div>
        </div>
    </div>
</div>
@endsection