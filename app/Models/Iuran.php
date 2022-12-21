<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    public function transaksi_iurans()
    {
        return $this->hasMany(Transaksi_iuran::class);
    } 
}
