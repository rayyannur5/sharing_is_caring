<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $donasis = auth()->user()->donasis;
 
        return response()->json([
            'success' => true,
            'data' => $donasis
        ]);
    }
    public function all()
    {
        //
        return Donasi::all();
    }

    public function showDonasi($id)
    {
        //
        if(!Donasi::find($id)){
            return response()->json([
                'message' => 'donasi not found'
            ], 400);
        }
        return Donasi::find($id);
    }
    public function showTransaksi($id)
    {
        //
        $donasi = Donasi::find($id);
        if(!$donasi){
            return response()->json([
                'message' => 'donasi not found'
            ], 400);
        }
        return $donasi->transaksi_donasis;
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
            'title' => 'required',
            'desc' => 'required',
            'target' => 'required'
        ]);
 
        $donasi = new Donasi();
        $donasi->title = $request->title;
        $donasi->desc = $request->desc;
        $donasi->target = $request->target;
 
        if (auth()->user()->donasis()->save($donasi))
            return response()->json([
                'success' => true,
                'data' => $donasi->toArray()
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
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        $donasi = auth()->user()->donasis()->find($donasi);
 
        if (!$donasi) {
            return response()->json([
                'success' => false,
                'message' => 'donasi not found '
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'donasi' => $donasi->toArray()
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $donasi = auth()->user()->donasis()->find($id);
 
        if (!$donasi) {
            return response()->json([
                'success' => false,
                'message' => 'donasi not found'
            ], 400);
        }
 
        $updated = $donasi->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'donasi can not be updated'
            ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = auth()->user()->donasis()->find($id);
 
        if (!$donasi) {
            return response()->json([
                'success' => false,
                'message' => 'donasi not found'
            ], 400);
        }
 
        if ($donasi->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'donasi can not be deleted'
            ], 500);
        }
    }
    
}
