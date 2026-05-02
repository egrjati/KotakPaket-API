<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'nomor_resi',
        'harga_cod',
        'kotak',
        'status',
        'image',
        'diambil_at',
    ];

    protected $casts = [
        'diambil_at' => 'datetime',
        'harga_cod'  => 'integer',
    ];
}
