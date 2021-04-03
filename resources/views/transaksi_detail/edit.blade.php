@extends('layouts.star')

@section('title')
Edit transaksi_detail
@endsection

@section('content')
<div class="col-lx-12 col-lg-12">

</div>
    
<div class="col-xl-12 col-lg-2 ">
  <div class="card shadow mb-12 border-left-secondary">
        <div class="card-body">
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('transaksi_detail.update',$transaksi_detail->id) }}"
             enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="form-group">
                        <label for="transaksi" class="col-sm-6">Nama Pemilik Paket</label>
                        <div class="col-sm-12">
                            <select name="transaksi_id" id="transaksi_id" class="form-control">
                                @foreach($transaksi as $row)
                                    <option value="{{ $row->id }}">{{ $row->member->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="transaksi" class="col-sm-2 control-label">Jenis Paket</label>
                        <div class="col-sm-12">
                            <select name="paket_id" id="paket_id" class="form-control">
                                @foreach($paket as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_paket }} - {{ $row->harga }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="member" class="col-sm-2 control-label">Jumlah Paket</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="jumlah_paket" value="{{$transaksi_detail->jumlah_paket}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-6">Keterangan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="keterangan" value="{{$transaksi_detail->keterangan}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-6">Subtotal</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="subtotal" value="{{$transaksi_detail->subtotal}}">
                            </div>
                        </div>
                    </div>
                    <div class="col sm 6">
                        <div class="box-footer">
                            <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection