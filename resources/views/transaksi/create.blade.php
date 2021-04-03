@extends('layouts.star')

@section('title')
Transaksi
@endsection

@section('content')
<div class="col-lx-12 col-lg-12">
    @include('alert.error')
</div>

<div class="col-xl-12 col-lg-2 ">
    <div class="card shadow mb-12 border-left-info">
        <div class="card-body">
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{ route('transaksi.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="outlet" class="col-sm-2 control-label">Outlet</label>
                            <div class="col-sm-12">
                                <select name="id_outlet" id="id_outlet" class="form-control">
                                    @foreach($outlet as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-2 control-label">Nama Member</label>
                            <div class="col-sm-12">
                                <select name="member_id" id="member_id" class="form-control">
                                    @foreach($member as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-2 control-label">Tanggal Masuk</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="tgl_masuk">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-6">Tanggal Batas Akhir</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="batas">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-6">Tanggal Bayar</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="tgl_bayar">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="member" class="col-sm-6">Status Pemesanan</label>
                            <div class="col-sm-12">
                                <select name="status" id="status" class="form-control">
                                  <option value="Baru">Baru</option>
                                  <option value="Selesai">Selesai</option>
                                  <option value="Diambil">Diambil</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="member" class="col-sm-6">Status Pembayaran</label>
                            <div class="col-sm-12">
                                <select name="bayar" id="bayar" class="form-control">
                                  <option value="Lunas">Lunas</option>
                                  <option value="Belum Lunas">Belum Lunas</option>
                                </select>
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