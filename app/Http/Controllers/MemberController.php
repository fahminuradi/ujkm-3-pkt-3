<?php

namespace App\Http\Controllers;

use App\Member;
use Validator;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $member = Member::paginate(5);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $member = Member::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'nama' => 'required|max:255|max:255',
            'alamat' => 'required|max:255',
            'jk' => 'required|max:255',
            'telepon' => 'required|max:255'
        ]);
        if($validator->fails())
        {
        return redirect()->route('member.create')->withErrors($validator)->withInput();
        }
        Member::create($input);
        return redirect()->route('member.index')->with('status', 'Member Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member =Member::findOrFail($id);
        return view('member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data,[
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'telepon' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('member.edit',[$id])->withErrors($validator);
        }
        $member->update($data);
        return redirect()->route('member.index')->with('success','member Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Member::findOrFail($id);
        $data->delete();
        return redirect()->route('member.index')->with('status',"Berhassil Menghapus");
    }
}
