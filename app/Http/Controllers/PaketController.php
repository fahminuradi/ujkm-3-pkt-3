<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Outlet;
use Validator;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paket = Paket::paginate(5);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $paket = Paket::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::all();
        return view('paket.create',compact('outlet'));
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
            'id_outlet' => 'required|max:255|max:255',
            'jenis' => 'required|max:255',
            'nama_paket' => 'required|max:255',
            'harga' => 'required|max:255'
        ]);
        if($validator->fails())
        {
            return redirect()->route('paket.create')->withErrors($validator)->withInput();
        }
        Paket::create($input);
        return redirect()->route('paket.index')->with('status', 'Paket Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket =Paket::findOrFail($id);
         $outlet = Outlet::all();
        return view('paket.edit',compact('paket','outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $paket = Paket::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data,[
           'id_outlet' => 'required|max:255|max:255',
            'jenis' => 'required|max:255',
            'nama_paket' => 'required|max:255',
            'harga' => 'required|max:255'
        ]);

        if($validator->fails()){
            return redirect()->route('paket.edit',[$id])->withErrors($validator);
        }
        $paket->update($data);
        return redirect()->route('paket.index')->with('success','Paket Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Paket::findOrFail($id);
        $data->delete();
        return redirect()->route('member.index')->with('status',"Berhasil Menghapus");
    }
}
