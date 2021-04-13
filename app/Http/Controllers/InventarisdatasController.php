<?php

namespace App\Http\Controllers;

use App\Models\Inventarisdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisdatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Inventarisdata::all();
        return view('contents.showdata', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkcek = $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required',
            'golongan' => 'required',
            'kabupaten' => 'nullable',
            'tempattugas' => 'nullable',
            'kode_label' => 'required',
            'lemari' => 'required'

        ]);

        $res = Inventarisdata::create($request->all());

        if ($res!=NULL && $checkcek!=NULL) {
            return redirect('/data')->with('status', 'success_create');
        }else{
            return redirect('/data')->with('status', 'failed_create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventarisdata  $inventarisdata
     * @return \Illuminate\Http\Response
     */
    public function show(Inventarisdata $data)
    {
        echo("haha");
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventarisdata  $inventarisdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventarisdata $data)
    {
        return view('contents.editdata', [
            'data' => $data
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventarisdata  $inventarisdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventarisdata $data)
    {
        $inventaris_id = $data->inventaris_id;
        $checkcek = $request->validate([
            'nip' => 'required|numeric|unique:inventarisdatas',
            'nama' => 'required',
            'golongan' => 'required',
            'kabupaten' => 'nullable',
            'tempat_tugas' => 'nullable',
            'kode_label' => 'required',
            'lemari' => 'required'

        ]);


        $res = Inventarisdata::where('inventaris_id',$data->inventaris_id)->
        update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'golongan' => $request->golongan,
            'kabupaten' => $request->kabupaten,
            'tempat_tugas' => $request->tempat_tugas,
            'kode_label' => $request->kode_label,
            'lemari' => $request->lemari
        ]);

        // dd($res);

        if ($res!=NULL) {
            return redirect('/data')->with('status', 'success_edit');
        }else{
            return redirect('/data')->with('status', 'failed_edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventarisdata  $inventarisdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventarisdata $data)
    {
        // dd($data);
        $res = Inventarisdata::destroy($data->inventaris_id);

        if ($res!=0) {
            return redirect('/data')->with('status', 'success_delete');
        }else{
            return redirect('/data')->with('status', 'failed_delete');
        }
    }
}
