<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksi_donasiRequest;
use App\Http\Requests\UpdateTransaksi_donasiRequest;
use App\Models\Transaksi_donasi;

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
     * @param  \App\Http\Requests\StoreTransaksi_donasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksi_donasiRequest $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_donasi  $transaksi_donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi_donasi $transaksi_donasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksi_donasiRequest  $request
     * @param  \App\Models\Transaksi_donasi  $transaksi_donasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksi_donasiRequest $request, Transaksi_donasi $transaksi_donasi)
    {
        //
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
