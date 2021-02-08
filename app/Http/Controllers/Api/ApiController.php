<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jumlahKasus;
use App\Models\rw;
use App\Models\provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\kelurahan;
use App\Models\negara;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $res = [
            'success'           => true,
            'Data'              => 'Data Kasus Di Indonesia',
            'Jumlah Positif'    => $positif,
            'Jumlah Sembuh'     => $sembuh,
            'Jumlah Meninngal'  => $meninggal,
            'message'           => 'Data Kasus di Tampilkan'
        ];
        return response()->json($res, 200);
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

    public function provinsi()
    {
        $test = DB::table('jumlah_kasuses')
            ->select(
                DB::raw('provinsis.nama_provinsi as provinsi'),
                DB::raw('SUM(jumlah_kasuses.positif) as positif'),
                DB::raw('SUM(jumlah_kasuses.sembuh) as sembuh'),
                DB::raw('SUM(jumlah_kasuses.meninggal) as meninggal')
            )
            ->join('rws', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->groupBy('provinsis.nama_provinsi')
            ->get();

        $res = [
            // 'success'   => true,
            'data'      => $test,
            'message'   =>  'Berhasil!'
        ];
        return response()->json($res, 200);
    }



    public function kota()
    {
        $test = DB::table('jumlah_kasuses')
            ->select(
                DB::raw('kotas.nama_kota as kota'),
                DB::raw('SUM(jumlah_kasuses.positif) as positif'),
                DB::raw('SUM(jumlah_kasuses.sembuh) as sembuh'),
                DB::raw('SUM(jumlah_kasuses.meninggal) as meninggal')
            )
            ->join('rws', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
            ->groupBy('kotas.nama_kota')
            ->get();

        $res = [
            // 'success'   => true,
            'data'      => $test,
            'message'   =>  'Berhasil!'
        ];
        return response()->json($res, 200);
    }

    public function kecamatan()
    {
        $test = DB::table('jumlah_kasuses')
            ->select(
                DB::raw('kecamatans.nama_kecamatan as kecamatan'),
                DB::raw('SUM(jumlah_kasuses.positif) as positif'),
                DB::raw('SUM(jumlah_kasuses.sembuh) as sembuh'),
                DB::raw('SUM(jumlah_kasuses.meninggal) as meninggal')
            )
            ->join('rws', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->groupBy('kecamatans.nama_kecamatan')
            ->get();

        $res = [
            // 'success'   => true,
            'data'      => $test,
            'message'   =>  'Berhasil!'
        ];
        return response()->json($res, 200);
    }


    public function kelurahan()
    {
        $test = DB::table('jumlah_kasuses')
            ->select(
                DB::raw('kelurahans.nama_kelurahan as kelurahan'),
                DB::raw('SUM(jumlah_kasuses.positif) as positif'),
                DB::raw('SUM(jumlah_kasuses.sembuh) as sembuh'),
                DB::raw('SUM(jumlah_kasuses.meninggal) as meninggal')
            )
            ->join('rws', 'rws.id', '=', 'jumlah_kasuses.id_rw')
            ->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->groupBy('kelurahans.nama_kelurahan')
            ->get();

        $res = [
            // 'success'   => true,
            'data'      => $test,
            'message'   =>  'Berhasil!'
        ];
        return response()->json($res, 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $positif = DB::table('provinsis')
            ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
            ->join('jumlah_kasuses', 'jumlah_kasuses.id_rw', '=', 'rws.id')
            ->select('jumlah_kasuses.positif')
            ->where('provinsis.id', $id)
            ->sum('jumlah_kasuses.positif');

        $sembuh = DB::table('provinsis')
            ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
            ->join('jumlah_kasuses', 'jumlah_kasuses.id_rw', '=', 'rws.id')
            ->select('jumlah_kasuses.sembuh')
            ->where('provinsis.id', $id)
            ->sum('jumlah_kasuses.sembuh');

        $meninggal = DB::table('provinsis')
            ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
            ->join('jumlah_kasuses', 'jumlah_kasuses.id_rw', '=', 'rws.id')
            ->select('jumlah_kasuses.meninggal')
            ->where('provinsis.id', $id)
            ->sum('jumlah_kasuses.meninggal');


        $provinsi = provinsi::whereId($id)->first();
        $res = [
            'success'           => true,
            'Data'              => 'Data Kasus Berdasarkan Provinsi',
            'Kode Provinsi'     => $provinsi['kode_provinsi'],
            'Provinsi'          => $provinsi['nama_provinsi'],
            'Jumlah Positif'    => $positif,
            'Jumlah Sembuh'     => $sembuh,
            'Jumlah Meninngal'  => $meninggal,
            'message'           => 'Data Kasus di Tampilkan'
        ];
        return response()->json($res, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testAPI()
    {
        //global positif
       $all = Http::get('https://api.kawalcorona.com/')->json();
    //    $positif     = Http::get('https://api.kawalcorona.com/positif')->json();
    //    $sembuh      = Http::get('https://api.kawalcorona.com/sembuh')->json();
    //    $meninggal   = Http::get('https://api.kawalcorona.com/meninggal')->json();
        $res = [
            'seucces'   => true,
            'data'      => $all,
            // 'Positif'   => $positif,
            // 'Sembuh'    => $sembuh,
            // 'Meninggal' => $meninggal
        ];
        return response()->json($res, 200);
    }
}
