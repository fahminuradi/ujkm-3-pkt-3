<?php

namespace App\Http\Controllers;

use App\TransaksiDetail;
use App\Transaksi;
use App\Paket;
use Validator;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi_detail = TransaksiDetail::paginate(5);
        $transaksi = Transaksi::all();
        $paket = Paket::all();

        return view('transaksi_detail.index', compact('transaksi_detail','transaksi','paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::all();
        $paket = Paket::all();
        return view('transaksi_detail.create', compact('transaksi','paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'transaksi_id' => 'required',
            'paket_id' => 'required',
            'jumlah_paket' => 'required',
            'keterangan' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('transaksi_detail.create')->withErrors($validator)->withInput();
        }
        TransaksiDetail::create($input);

        $paket = Paket::find($input['paket_id']);
        $total['subtotal'] = $paket->harga + $input['jumlah_paket'];
        
        


        return redirect()->route('transaksi_detail.index')->with('status', 'Member Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi_detail = TransaksiDetail::findOrFail($id);
        $transaksi = Transaksi::all();
        $paket = Paket::all();
        return view ('transaksi_detail.edit', compact('transaksi_detail','transaksi','paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $transaksi_detail = TransaksiDetail::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data,[
             'transaksi_id' => 'required',
            'paket_id' => 'required',
            'jumlah_paket' => 'required',
            'subtotal' => 'required',
            'keterangan' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('transaksi_detail.edit',[$id])->withErrors($validator);
        }
        $transaksi_detail->update($data);
        return redirect()->route('transaksi_detail.index')->with('success','transaksi_detail Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiDetail  $transaksiDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data=TransaksiDetail::findOrFail($id);
        $data->delete();
        return redirect()->route('transaksi_detail.index')->with('status',"Berhasil Menghapus");
    }
}
