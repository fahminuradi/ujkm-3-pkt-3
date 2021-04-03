@extends('layouts.star')
@section('title')
Data Transaksi_detail
@endsection

@section('content')

<div class="col-lx-12 col-lg-12">
    <div class="card shadow mb-12">
        <div class="card-header border-left-secondary">
            @if(Request::get('keyword'))
            <a href="{{ route('transaksi_detail.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
            @else
            <a href="{{ route('transaksi_detail.create') }}" class="btn btn-secondary"><i class="fa fa-plus"></i></a>
            @endif

            <form method="get" action="{{route('transaksi_detail.index')}}"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-7 my-md-0 mw-100 navbar-search ">
                <div class="input-group">
                    <input type="text" id="keyword" name="keyword" value="{{Request::get('keyword')}}"
                        class="form-control bg-light border-1" placeholder="Search By member" aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>



<div class="col-xl-12 col-lg-2 ">
    <div class="card shadow mb-12 border-left-secondary">
        <div class="card-body">
            <div class="box-body">
                @if(Request::get('keyword'))
                <div class="alert alert-secondary alert-block">
                    Hasil Pencarian <b>{{ Request::get('keyword') }}</b>
                </div>
                @endif
                


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Paket</th>
                            <th>Jumlah Paket</th>
                            <th>Subtotal</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach ($transaksi_detail as $row)
                            <tr>
                                <td> {{ $loop->iteration + ($transaksi_detail->perpage() * ($transaksi_detail->currentPage() -1)) }}</td>
                                <td> {{ $row->transaksi->member->nama }} </td>
                                <td> {{ $row->paket->nama_paket }} </td>
                                <td> {{ $row->jumlah_paket }} </td>
                                <td> {{ $row->subtotal }} </td>
                                <td> 
                                    <form method="post" action="{{ route('transaksi_detail.destroy', [$row->id]) }}" 
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('transaksi_detail.edit',[$row->id]) }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $transaksi_detail->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection