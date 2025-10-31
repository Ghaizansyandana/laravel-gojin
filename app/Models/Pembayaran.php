<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['transaksi_id', 'pelanggan_id', 'metode', 'jumlah_bayar', 'kembalian'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}

