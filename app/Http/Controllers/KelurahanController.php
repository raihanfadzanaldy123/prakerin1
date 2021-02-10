<?php

namespace App\Http\Controllers;

use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
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
        $kelurahan = kelurahan::with('kecamatan')->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = kecamatan::all();
        return view('kelurahan.create', compact('kecamatan'));
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
            'nama_kelurahan' => 'required|max:25'
        ], [
            'nama_kelurahan.required' => 'Tolong Masukan Nama kelurahan'
        ]);

        $kelurahan = new kelurahan();
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save(); //method khusus untuk inputan/menyimpan ke DB
        return redirect()->route('kelurahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        return view('kelurahan.show', compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kecamatan = kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan','kecamatan'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kelurahan->kode_kelurahan      = $request->kode_kelurahan;
        $kelurahan->nama_kelurahan      = $request->nama_kelurahan;
        $kelurahan->id_kecamatan        = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index');
    }
}
