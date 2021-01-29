<?php

namespace App\Http\Controllers;

use App\Models\jumlahKasus;
use App\Models\rw;
use Illuminate\Http\Request;

class JumlahKasusController extends Controller
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
        $kasus = jumlahKasus::with('rw')->get();
        return view('kasus.index', compact('kasus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = rw::all();
        return view('kasus.create', compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus = new jumlahKasus();
        $kasus->positif         = $request->positif;
        $kasus->sembuh          = $request->sembuh;
        $kasus->meninggal       = $request->meninggal;
        $kasus->id_rw           = $request->id_rw;
        $kasus->save(); //method khusus untuk inputan/menyimpan ke DB
        return redirect()->route('kasus.index');
    }

    /** 
     * Display the specified resource.
     *
     * @param  \App\Models\jumlahKasus  $jumlahKasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus = jumlahKasus::findOrFail($id);
        return view('kasus.show', compact('kasus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jumlahKasus  $jumlahKasus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasus = jumlahKasus::findOrFail($id);
        $rw    = rw::all();
        return view('kasus.edit', compact('kasus','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jumlahKasus  $jumlahKasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus = jumlahKasus::findOrFail($id);
        $kasus->positif             = $request->positif;
        $kasus->sembuh              = $request->sembuh;
        $kasus->meninggal           = $request->meninggal;
        $kasus->id_rw               = $request->id_rw;
        $kasus->save();
        return redirect()->route('kasus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jumlahKasus  $jumlahKasus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus = jumlahKasus::findOrFail($id)->delete();
        return redirect()->route('kasus.index');
    }
}
