<?php

namespace App\Http\Controllers\Api;

use App\Models\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ApiController extends Controller
{
    public function index(){

        $positif = DB::table('rws')
                 ->select('kasuses.jumlah_positif',
                 'kasuses.jumlah_meninggal','kasuses.jumlah_sembuh')
                 ->join('kasuses','rws.id','kasuses.id_rw')
                 ->sum('kasuses.jumlah_positif');
      $meninggal = DB::table('rws')
                 ->select('kasuses.jumlah_positif',
                 'kasuses.jumlah_meninggal','kasuses.jumlah_sembuh')
                 ->join('kasuses','rws.id','=','kasuses.id_rw')
                 ->sum('kasuses.jumlah_meninggal');
      $sembuh = DB::table('rws')
                 ->select('kasuses.jumlah_positif',
                 'kasuses.jumlah_meninggal','kasuses.jumlah_sembuh')
                 ->join('kasuses','rws.id','=','kasuses.id_rw')
                 ->sum('kasuses.jumlah_sembuh');

                 $res = [
                     'success' => true,
                     'Data'             => 'Data Kasus Indonesia',
                     'Jumlah Positif'   => $positif,
                     'Jumlah Meninggal' => $meninggal,
                     'Jumlah Sembuh'    => $sembuh,
                     'message' => 'Data Kasus Ditampilkan'
                 ];

                 return response()->json($res,200);
    }
    public function show($id)
    {
        $positif = DB::table('provinsis')
            ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
            ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
            ->select('kasuses.jumlah_positif')
            ->where('provinsis.id', $id)
            ->sum('kasuses.jumlah_positif');

        $sembuh = DB::table('provinsis')
            ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
            ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
            ->select('kasuses.jumlah_sembuh')
            ->where('provinsis.id', $id)
            ->sum('kasuses.jumlah_sembuh');

        $meninggal = DB::table('provinsis')
            ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
            ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
            ->select('kasuses.jumlah_meninggal')
            ->where('provinsis.id', $id)
            ->sum('kasuses.jumlah_meninggal');


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

            public function provinsi3(){
                 $nampil = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                ->join('kasuses','kasuses.id_rw','=','rws.id')
                ->select('nama_provinsi',
                      DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                      DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'),
                      DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'))
                ->groupBy('nama_provinsi')
                ->get();
 
                $res = [
                    'success' => true,
                    'Data'    => $nampil,
                    'message' => 'Data Kasus Provinsi Ditampilkan'
                ];
                 return response()->json($res,200);
            }
}

