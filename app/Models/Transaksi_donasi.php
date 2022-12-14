<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_donasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'donasi_id',
        'nominal',
        'metode'
    ];
}
