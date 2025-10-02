<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // table yang digunakan adalah table 'posts'
    protected $table='posts';

    // apa saja yang boleh di isi
    public $fillable = ['title','content'];

    // apa saja yang boleh di tampilkan
    public $visible = ['id','title','content'];

    // mengisi tanggal kapan dibuat dan kapan di update secara otomatis
    public $timestamps = true;
}
