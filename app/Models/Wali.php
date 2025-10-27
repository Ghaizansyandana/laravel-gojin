<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;
    
    protected $table = 'walis'; // Pastikan nama tabel benar

    // Tambahkan properti $fillable untuk mengizinkan kolom-kolom ini diisi secara massal
    protected $fillable = [
        'nama_wali',
        'alamat',
        'no_telepon',
        // Tambahkan semua kolom yang boleh diisi dari form di sini
    ];

    // Jika Anda tidak ingin menggunakan $fillable, Anda bisa menggunakan $guarded
    // protected $guarded = ['id']; // Mengizinkan semua kolom kecuali 'id'

    // ... relasi atau kode lain
}