<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'target',
    ];

    
    public function transaksi_donasis()
    {
        return $this->hasMany(Transaksi_donasi::class);
    } 
    public function transaksi_donasis_guest()
    {
        return $this->hasMany(Transaksi_donasi_guest::class);
    } 
}
