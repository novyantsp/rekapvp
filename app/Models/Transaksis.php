<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksis extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_transaksi', 'nominal_transaksi', 'keterangan_transaksi', 'sesi_id'
    ];

    public function rekaps()
    {
        return $this->belongsTo(Rekaps::class);
    }
}
