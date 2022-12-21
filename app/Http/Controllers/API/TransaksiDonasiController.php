<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi_donasi;
use App\Models\Donasi;
use Illuminate\Http\Request;

class TransaksiDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksis = auth()->user()->transaksi_donasis;
 
        return response()->json([
            'success' => true,
            'data' => $transaksis
        ]);
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
        $this->validate($request, [
            'donasi_id' => 'required',
            'nominal' => 'required',
            'metode' => 'required'
        ]);

        if(!Donasi::find($request->donasi_id)){
            return response()->json([
                'success' => false,
                'message' => 'donasi not found'
            ]);
        }
 
        $transaksi = new Transaksi_donasi();
        $transaksi->donasi_id = $request->donasi_id;
        $transaksi->nominal = $request->nominal;
        $transaksi->metode = $request->metode;
 
        if (auth()->user()->transaksi_donasis()->save($transaksi))
            return response()->json([
                'success' => true,
                'data' => $transaksi->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post not added'
            ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_donasi  $transaksi_donasi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_donasi $transaksi_donasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_donasi  $transaksi_donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi_donasi $transaksi_donasi)
    {
        //
        return response()->json([
            'success' => true,
            // 'data' => $transaksis
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_donasi  $transaksi_donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi_donasi $transaksi_donasi)
    {
        //
    }
}
