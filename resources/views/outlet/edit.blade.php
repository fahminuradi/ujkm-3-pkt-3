@extends('layouts.star')

@section('title')
Edit outlet
@endsection

@section('content')
<div class="col-lx-12 col-lg-12">

</div>
    
<div class="col-xl-12 col-lg-2 ">
  <div class="card shadow mb-12 border-left-secondary">
        <div class="card-body">
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('outlet.update',$outlet->id) }}"
             enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
             <div class="box-body">

                <div class="form-group">
                  <label for="Nama outlet" class="col-sm-2 control-label">Nama Outlet</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $outlet->nama}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $outlet->alamat}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Telepon" class="col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" id="tlp" name="tlp" value="{{ $outlet->tlp}}">
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