<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kota;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KecamatanController extends Controller
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
        $kecamatan = kecamatan::with('kota')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = kota::all();
        return view('kecamatan.create', compact('kota'));
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
            'kode_kecamatan' => 'required|max:4',
            'nama_kecamatan' => 'required|max:25'
        ],[
            'kode_kecamatan.required' => 'Tolong Masukan Kode kecamatan',
            'nama_kecamatan.required' => 'Tolong Masukan Nama kecamatan'
        ]);

        $kecamatan = new kecamatan();
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save(); //method khusus untuk inputan/menyimpan ke DB
        return redirect()->route('kecamatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = kecamatan::findOrFail($id);
        return view('kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = kecamatan::findOrFail($id);
        $kota = kota::all();
        return view('kecamatan.edit', compact('kecamatan', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kecamatan = kecamatan::findOrFail($id);
        $kecamatan->kode_kecamatan      = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan      = $request->nama_kecamatan;
        $kecamatan->id_kota             = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index');
    }
}
