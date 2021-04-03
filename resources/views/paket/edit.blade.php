@extends('layouts.star')

@section('title')
Edit paket
@endsection

@section('content')
<div class="col-lx-12 col-lg-12">

</div>
    
<div class="col-xl-12 col-lg-2 ">
  <div class="card shadow mb-12 border-left-secondary">
        <div class="card-body">
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('paket.update',$paket->id) }}"
             enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
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
                  <label for="Nama Paket" class="col-sm-2 control-label">Nama Paket</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{$paket->nama_paket}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Telepon" class="col-sm-2 control-label">Jenis</label>
                  <div class="col-sm-12">
                    <select name="jenis" id="jenis" class="form-control">
                      <option value="Kiloan">Kiloan</option>
                      <option value="Roll">Roll</option>
                      <option value="Lembar">Lembar</option>
                      <option value="Unit">Unit</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Harga" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="harga" name="harga" value="{{$paket->harga}}">
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