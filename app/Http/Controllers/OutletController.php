<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;
use Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $outlet = Outlet::paginate(5);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $outlet = Outlet::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create');
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
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tlp' => 'required|max:255'
        ]);
        if($validator->fails())
        {
            return redirect()->route('outlet.create')->withErrors($validator)->withInput();
        }
        Outlet::create($input);
        return redirect()->route('outlet.index')->with('success', 'outlet Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlet =Outlet::findOrFail($id);
        return view('outlet.edit',compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $outlet = Outlet::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data,[
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tlp' => 'required|max:255'
        ]);

        if($validator->fails()){
            return redirect()->route('outlet.edit',[$id])->withErrors($validator);
        }
        $outlet->update($data);
        return redirect()->route('outlet.index')->with('success','outlet Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
    }
}
