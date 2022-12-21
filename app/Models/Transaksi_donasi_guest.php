<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_donasi_guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'donasi_id',
        'name',
        'nominal',
        'payment_method'
    ];
}
