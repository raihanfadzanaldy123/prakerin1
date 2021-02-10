<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
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

        return view('welcome', compact('data', 'data2','data3', 'positif','sembuh','meninggal'));
    }
}
