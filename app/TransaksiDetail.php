<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksi_detail';
    protected $fillable = [
    	'transaksi_id','paket_id','subtotal','keterangan','jumlah_paket'
    ];

     public function transaksi()
    {
    	return $this->belongsTo('App\Transaksi','transaksi_id');
    }

     public function paket()
    {
    	return $this->belongsTo('App\Paket','paket_id');
    }
}
