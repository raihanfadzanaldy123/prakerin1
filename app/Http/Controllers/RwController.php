<?php

namespace App\Http\Controllers;

use App\Models\rw;
use App\Models\kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rw = rw::with('kelurahan')->get();
        return view('rw.index', compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = kelurahan::all();
        return view('rw.create', compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_rw' => 'required|max:4',
            'nama_rw' => 'required|max:25'
        ],  [
            'kode_rw.required' => 'Tolong Masukan Kode Rukun Warga',
            'nama_rw.required' => 'Tolong Masukan Nama Rukun Warga'
        ]);

        $rw = new rw();
        $rw->kode_rw = $request->kode_rw;
        $rw->nama_rw = $request->nama_rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save(); //method khusus untuk inputan/menyimpan ke DB
        return redirect()->route('rw.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = rw::findOrFail($id);
        return view('rw.show', compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = rw::findOrFail($id);
        $kelurahan = kelurahan::all();
        return view('rw.edit', compact('rw','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rw = rw::findOrFail($id);
        $rw->kode_rw      = $request->kode_rw;
        $rw->nama_rw      = $request->nama_rw;
        $rw->id_kelurahan        = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = rw::findOrFail($id)->delete();
        return redirect()->route('rw.index');
    }
}
