<?php

namespace App\Http\Controllers;

use App\Models\negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $global = negara::all();
        return view('global.index', compact('global'));
    }

    public function testAPI()
    {
        //global positif
        $readAPIGlobPos = file_get_contents('https://api.kawalcorona.com/positif');
        $data['globalPos'] = json_decode($readAPIGlobPos,true);

        $readAPIGlobSem = file_get_contents('https://api.kawalcorona.com/sembuh');
        $data['globalSem'] = json_decode($readAPIGlobSem,true);

        $readAPIGlobMen    = file_get_contents('https://api.kawalcorona.com/meninggal');
        $data['globalMen'] = json_decode($readAPIGlobMen,true);
        return view('global.index', compact($data));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function show(negara $negara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function edit(negara $negara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, negara $negara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function destroy(negara $negara)
    {
        //
    }
}
