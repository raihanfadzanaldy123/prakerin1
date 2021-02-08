<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\provinsi;
use illuminate\Support\Facades\Validator;

class provinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = provinsi::latest()->get();
        $res      = [
                'success' => true,
                'data'    => $provinsi,
                'message' => 'Berhasil Namapil'
        ];
        return response()->json($res,200);
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
        //validate Data
        $validator = Validator::make($request->all(), [
            'kode_provinsi' => 'required',
            'nama_provinsi' => 'required',
        ],
            [
                'kode_provinsi.required' => 'Masukan Kode Provinsi disini!',
                'nama_provinsi.required' => 'Masukan Nama Provinsi disini!',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'Success' => false,
                    'message' => 'Silahkan Isi Kolom yang Kosong',
                    'data'    => $validator->errors(),
                ],400);
            }
            else {
                $provinsi = provinsi::whereId($request->input('id'));
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail provinsi!',
                'data'    => $provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
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
}
