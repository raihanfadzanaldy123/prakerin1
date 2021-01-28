<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Http\Controller\DB;
use Illuminate\Http\Request;
use Validator;

class ProvinsiController extends Controller
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
        $provinsi = provinsi::all();
        return view('provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
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
            'kode_provinsi' => 'required|max:4',
            'nama_provinsi' => 'required|max:25'
        ], [
            'kode_provinsi.required' => 'Tolong Masukan Kode Provinsi',
            'nama_provinsi.required' => 'Tolong Masukan Nama Provinsi'
        ]);
        
        $provinsi = new provinsi;
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save(); //method khusus untuk inputan/menyimpan ke DB
        return redirect()->route('provinsi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = provinsi::findOrFail($id);
        return view('provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provinsi = provinsi::findOrFail($id);
        $provinsi->kode_provinsi      = $request->kode_provinsi;
        $provinsi->nama_provinsi      = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index');
    }
}
