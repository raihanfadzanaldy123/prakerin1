<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FrontEndController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //API Kawal Corona
        $all = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $data = $all->json();
        $all2 = Http::get('https://api.kawalcorona.com/indonesia');
        $data2 = $all2->json();
        $all3 = Http::get('https://api.kawalcorona.com/');
        $data3 = $all3->json();

        $datadunia = file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);

        // Date
        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM Y');

        //Data Provinsi
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

        return view('welcome', compact('data', 'data2', 'data3', 'provinsi', 'positif', 'sembuh', 'meninggal', 'tanggal'));
    }
}
