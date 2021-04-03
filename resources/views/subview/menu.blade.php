<li class="nav-item active">
    <a class="nav-link" href="/home">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
@if(Auth::user()->role == 'admin')
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-list"></i>
        <span>Menu</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/user"><i class="fa fa-circle-o"></i> User</a>
            <a class="collapse-item" href="/outlet"><i class="fa fa-circle-o"></i> Outlet</a>
            <a class="collapse-item" href="/paket"><i class="fa fa-circle-o"></i> Paket</a>
            <a class="collapse-item" href="/member"><i class="fa fa-circle-o"></i> Member</a>
            <a class="collapse-item" href="/transaksi"><i class="fa fa-circle-o"></i> Tagihan</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="/transaksi_detail">
    <i class="fa fa-fw fa-exchange"></i>
    <span>Pembayaran</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/report">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Buat Laporan</span></a>
</li>
@endif


@if(Auth::user()->role == 'kasir')
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-list"></i>
        <span>Menu</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/member"><i class="fa fa-circle-o"></i> Member</a>
            <a class="collapse-item" href="/transaksi"><i class="fa fa-circle-o"></i> Tagihan</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="/transaksi_detail">
    <i class="fa fa-fw fa-exchange"></i>
    <span>Pembayaran</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/report">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Buat Laporan</span></a>
</li>
@endif

@if(Auth::user()->role == 'owner')
<li class="nav-item">
    <a class="nav-link" href="/report">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Buat Laporan</span></a>
</li>
@endif

