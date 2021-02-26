<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $provinsi = DB::table('jumlah_kasuses')
            ->select(
                'nama_provinsi',
                DB::raw('SUM(jumlah_kasuses.positif) as positif'),
                DB::raw('SUM(jumlah_kasuses.sembuh) as sembuh'),
                DB::raw('SUM(jumlah_kasuses.meninggal) as meninggal')
            )
            ->join('rws', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->groupBy('nama_provinsi')
            ->get();

        //Jumlah kasus
        $positif = DB::table('rws')
            ->select('jumlah_kasuses.positif', 'jumlah_kasuses.sembuh', 'jumlah_kasuses.meninggal')
            ->join('jumlah_kasuses', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->sum('jumlah_kasuses.positif');

        $sembuh = DB::table('rws')
            ->select('jumlah_kasuses.positif', 'jumlah_kasuses.sembuh', 'jumlah_kasuses.meninggal')
            ->join('jumlah_kasuses', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->sum('jumlah_kasuses.sembuh');

        $meninggal = DB::table('rws')
            ->select('jumlah_kasuses.positif', 'jumlah_kasuses.sembuh', 'jumlah_kasuses.meninggal')
            ->join('jumlah_kasuses', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->sum('jumlah_kasuses.meninggal');

        return view('layouts.master', compact('provinsi', 'positif', 'sembuh', 'meninggal'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function admin()
    {
        return view('layouts.master');
    }
}
