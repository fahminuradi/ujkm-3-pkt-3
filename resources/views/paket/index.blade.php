@extends('layouts.star')
@section('title')
Data Paket
@endsection

@section('content')

<div class="col-lx-12 col-lg-12">
    <div class="card shadow mb-12">
        <div class="card-header border-left-secondary">
            @if(Request::get('keyword'))
            <a href="{{ route('paket.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
            @else
            <a href="{{ route('paket.create') }}" class="btn btn-secondary"><i class="fa fa-plus"></i></a>
            @endif

            <form method="get" action="{{route('paket.index')}}"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-7 my-md-0 mw-100 navbar-search ">
                <div class="input-group">
                    <input type="text" id="keyword" name="keyword" value="{{Request::get('keyword')}}"
                        class="form-control bg-light border-1" placeholder="Search By Paket" aria-label="Search"
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
                            <th>Nama Outlet</th>
                            <th>Nama Paket</th>
                            <th>Jenis Paket</th>
                            <th>Harga</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach ($paket as $row)
                            <tr>
                                <td> {{ $loop->iteration + ($paket->perpage() * ($paket->currentPage() -1)) }}</td>
                                <td> {{ $row->outlet->nama }} </td>
                                <td> {{ $row->nama_paket }} </td>
                                <td> {{ $row->jenis }} </td>
                                <td> {{ $row->harga }} </td>
                                <td> 
                                    <form method="post" action="{{ route('paket.destroy', [$row->id]) }}" 
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('paket.edit',[$row->id]) }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $paket->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection