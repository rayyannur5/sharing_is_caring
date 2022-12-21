<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Transaksi_donasi_guest;
use Illuminate\Http\Request;

class TransaksiDonasiGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $this->validate($request, [
            'donasi_id' => 'required',
            'name' => 'required',
            'payment_method' => 'required',
            'nominal' => 'required'
        ]);

        if(!Donasi::find($request->donasi_id)){
            return response()->json([
                'success' => false,
                'message' => 'donasi not found'
            ]);
        }

        $transaksi = Transaksi_donasi_guest::create([
            'donasi_id' => $request->donasi_id,
            'name' => $request->name,
            'nominal' => $request->nominal,
            'payment_method' => $request->payment_method
        ]);

        if($transaksi){
            return response()->json([
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'message' => 'failed'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_donasi_guest  $transaksi_donasi_guest
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_donasi_guest $transaksi_donasi_guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_donasi_guest  $transaksi_donasi_guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi_donasi_guest $transaksi_donasi_guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_donasi_guest  $transaksi_donasi_guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi_donasi_guest $transaksi_donasi_guest)
    {
        //
    }
}
