<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
    	'id_outlet','member_id','tgl_masuk','batas',
    	'tgl_bayar','status','bayar'
    ];

     public function outlet()
    {
    	return $this->belongsTo('App\Outlet','id_outlet');
    }

     public function member()
    {
    	return $this->belongsTo('App\Member','member_id');
    }
}
