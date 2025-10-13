<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tgl_lahir', 'jk', 'agama', 'alamat', 'tb', 'bb', 'foto'];
    protected $visible =  ['nama', 'tgl_lahir', 'jk', 'agama', 'alamat', 'tb', 'bb', 'foto'];
}
