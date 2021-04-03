@extends('layouts.star')
@section('title')
Aplikasi Manajemen Laundry
@endsection

@section('content')

<div class="col-xl-12 col-lg-2 ">
    <div class="card shadow border-left-primary">
        <div class="card-body">
            <div class="box-body">
                <h4>Selamat Datang : <b>{{Auth::user()->username}}</b></h4>
                <h6>anda masuk sebagai : <b>{{Auth::user()->role}}</b></h6>                
            </div>
        </div>
    </div>
</div>


<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-1">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Outlet</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $outlet }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-home fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-1">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Member</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $member }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-1">
                    <div class="text-xs font-weight-bold tkext-primary text-uppercase mb-1">
                        Paket</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $paket }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-2 ">
    <div class="card shadow mb-12 border-left-info">
        <div class="card-body">
            <div class="box-body">
                
            <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="gambar/1.png" alt="Los Angeles">
  </div>
  <div class="carousel-item">
    <img src="gambar/2.png" alt="Chicago">
  </div>
  <div class="carousel-item">
    <img src="gambar/3.png" alt="New York">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>

            </div>
        </div>
    </div>
</div>




@endsection