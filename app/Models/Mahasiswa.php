<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Wali;
use App\Models\Dosen;
use App\Models\Hobi;

class Mahasiswa extends Model

{
    public function hobi()
    {
        return $this->hobis(); // memanggil relasi existing
    }
    
    protected $fillable = ['nama', 'nim'];
    
    public function wali()
    {
        return $this->hasOne(Wali::class, 'id_mahasiswa');
    }

    // Relation: Mahasiswa belongs to a Dosen (mentor/advisor)
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    // Relation: Mahasiswa has many Hobis (many-to-many)
    public function hobis()
    {
        return $this->belongsToMany(Hobi::class, 'mahasiswa_hobi', 'id_mahasiswa', 'id_hobi');
    }
}
