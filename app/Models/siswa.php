<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{

    // table yang digunakan adalah table 'posts'
    protected $table='post';

    // apa saja yang boleh di isi
    public $fillable = ['title','content'];

    // apa saja yang boleh di tampilkan
    public $visible = ['title','content'];

    // mengisi tanggal kapan dibuat dan kapan di update secara otomatis
    public $timestamps = true;
}
