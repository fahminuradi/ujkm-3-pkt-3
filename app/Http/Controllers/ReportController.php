<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiDetail;
use App\Member;
use App\Transaksi;
use App\Outlet;
use App\Paket;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $report = TransaksiDetail::orderBy('created_at','Desc')->paginate(20);
        return view('report.index', compact('report'));        
    }
    public function cetak_pdf()
    {
        $report = TransaksiDetail::orderBy('created_at','Desc')->get();
        $pdf = PDF::loadview('report.report_pdf', compact('report'));
        return $pdf -> stream();
    }
}
