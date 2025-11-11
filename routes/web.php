<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use App\Models\Wali; 
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\Transaksi2Controller;


Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return '<h1>Halo</h1>'. '<h2>Selamat Datang di Perpustakaan Digital</h2>';
});

Route::get('ghaizan', function () {
    return '<h1>Halo</h1>'. '<h2>Nama saya ghaizan, sekolah di smk assalaam</h2>';
});

Route::get('buku', function () {
    return '<br>ini buku saya';
});

Route::get('menu', function () {
    $data = [
        [ 'nama_makanan' => 'nasi goreng', 'harga' => 15000, 'jumlah' => 2],
        [ 'nama_makanan' => 'nasi uduk', 'harga' => 10000, 'jumlah' => 1],
        [ 'nama_makanan' => 'nasi kuning', 'harga' => 12000, 'jumlah' => 3],
    ];
    $resto = "Gojin Resto makanan penuh lemak";
    return view('menu', compact('data', 'resto'));
});

Route::get('books/{judul}', function ($judul) {
    return 'Judul buku : '. $judul;
});

Route::get('profil/{name?}', function ($name = "Guest") {
    return 'Nama User : ' . $name;
});

Route::get('order/{item?}', function ($item = "Nasi") {
    return view('order', compact('item'));
});

Route::get('list', function () {
    $barang = [
        [ 'nama_barang' => 'buku', 'harga' => 15000, 'qty' => 2],
        [ 'nama_barang' => 'pensil', 'harga' => 3000, 'qty' => 1],
        [ 'nama_barang' => 'penggaris', 'harga' => 7000, 'qty' => 3],
    ];
    $toko = "Toko Gojin Jaya";
    return view('list', compact('barang', 'toko'));
});

Route::get('nilai/{nama?}/{mapel?}/{nilai?}', function ($nama = "Guest", $mapel = "Tidak ada", $nilai = 0) {
    $data = [
        [
            'nama' => $nama,
            'mapel' => $mapel,
            'nilai' => $nilai
        ]
    ];

    return view('nilai', compact('data'));
});

Route::get('grading/{nama?}/{nilai?}', function ($nama = "n", $nilai = "nilai") {
    $angka = [
        [
            'n' => $nama,
            'nilai' => $nilai,
        ]
    ];

    return view('grading', compact('nama', 'nilai'));
});

// latihan 4
Route::get('/nilai-ratarata', function () {
    $siswa = [
        ['nama' => 'Andi',  'nilai' => 85],
        ['nama' => 'Budi',  'nilai' => 70],
        ['nama' => 'Citra', 'nilai' => 95],
    ];
    $total = 0;
    foreach ($siswa as $data) {
        $total += $data['nilai'];
    }
    $rata = $total / count($siswa);

    return view('nilai_ratarata', compact('siswa', 'rata'));
});

Route::get('test-model', function () {
    $data = App\Models\Post::all();
    // menampilkan data ke browser
    return $data;
});

Route::get('create-data', function () {
    $data = App\Models\Post::create([
        // 'field' => 'value'
        'title' => 'Seringai',
        'content' => 'Lorem ipsum',
    ]);
    // menampilkan data ke browser
    return $data;
});

Route::get('show-data/{id}', function($id){
    // Menampilkan data berdasarkan parameter id
    $data = App\Models\Post::find($id);
    // menampilkan data ke browser
    return $data;
});

Route::get('edit-data/{id}', function($id){
    // Mencari data berdasarkan parameter id
    $data = App\Models\Post::find($id);
    $data->title = "Membangun Project dengan Laravel";
    $data->save();
    return $data;
});

Route::delete('delete-data/{id}', function ($id) {
    $data = App\Models\Post::find($id);
    $data->delete();
    return redirect('test-model');
});

Route::get('search/{cari}', function ($query) {
    $data = App\Models\Post::where('title', 'like', '%' . $query . '%')->get();
    return $data;
});

Route::get('greetings', [MyController::class, 'hello']);
Route::get('student', [MyController::class, 'siswa']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::resource('produk', ProdukController::class)->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('biodata', BiodataController::class)->middleware('auth');

Route::get('/one-to-one', [RelasiController::class, 'index']);
Route::get('/wali-ke-mahasiswa', function () {
    $wali = Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});

Route::get('/one-to-many', [RelasiController::class, 'OneToMany']);
Route::get('/mahasiswa-ke-dosen', function () {
    $mhs = Mahasiswa::where('nim', '123456')->first();
    return "{$mhs->nama} dibimbim oleh {$mhs->dosen->nama}";
});

Route::get('/many-to-many', [HobiController::class, 'manyToMany']);

Route::get('eloquent', [RelasiController::class, 'eloquent']);

// Search Routes (must be before resource routes to avoid conflict)
Route::middleware('auth')->group(function () {
    Route::get('/transaksi/search', [TransaksiController::class, 'search'])->name('transaksi.search');
    Route::get('/pembayaran/search-transaksi', [PembayaranController::class, 'searchTransaksi'])->name('pembayaran.search-transaksi');
    
    // Transaksi Routes
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pembayaran', PembayaranController::class);
});
