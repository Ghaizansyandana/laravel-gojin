<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen'; // 🔥 tambahkan baris ini!
    protected $fillable = ['nama', 'nipd'];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_dosen');
    }
}
