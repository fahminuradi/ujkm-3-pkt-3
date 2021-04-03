<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Member;
use App\Outlet;
use Validator;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = Transaksi::paginate(5);
        $outlet = Outlet::all();
        $member = Member::all();

        $member = Member::paginate(5);
   
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $member = Member::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('transaksi.index', compact('transaksi','outlet','member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::all();
        $member = Member::all();
        return view('transaksi.create',compact('outlet','member'));
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
            'id_outlet' => 'required',
            'member_id' => 'required',
            'tgl_masuk' => 'required',
            'tgl_bayar' => 'required',
            'batas' => 'required',
            'status' => 'required',
            'bayar' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('transaksi.create')->withErrors($validator)->withInput();
        }
        Transaksi::create($input);
        return redirect()->route('transaksi.index')->with('status', 'Transaksi Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $outlet = Outlet::all();
        $member = Member::all();
        return view ('transaksi.edit', compact('transaksi','outlet','member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data,[
            'id_outlet' => 'required',
            'member_id' => 'required',
            'tgl_masuk' => 'required',
            'tgl_bayar' => 'required',
            'batas' => 'required',
            'status' => 'required',
            'bayar' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('transaksi.edit',[$id])->withErrors($validator);
        }
        $transaksi->update($data);
        return redirect()->route('transaksi.index')->with('success','Transaksi Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Transaksi ::findOrFail($id);
        $data->delete();
        return redirect()->route('transaksi.index')->with('status',"Berhasil Menghapus");
    }
}
