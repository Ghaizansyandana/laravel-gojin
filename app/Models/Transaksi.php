<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['pelanggan_id', 'tanggal_transaksi', 'total_harga', 'kode_transaksi'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'transaksi_id');
    }

}
