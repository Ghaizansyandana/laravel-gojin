<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

// basic 
Route::get('about', function(){
    return '<h1>Halo</h1>'. 
    '<h2>Selamat Datang di Perpustakaan Digital</h2>';
});

// perkenalan
Route::get('ghaizan', function(){
    return '<h1>Halo</h1>'. 
    '<h2>Nama saya ghaizan, sekolah di smk assalaam</h2>';
});

Route::get('buku', function(){
    return '<br>ini buku saya';
});

Route::get('menu', function(){
    $data = [
        [ 'nama_makanan' => 'nasi goreng', 'harga' => 15000, 'jumlah' => 2],
        [ 'nama_makanan' => 'nasi uduk', 'harga' => 10000, 'jumlah' => 1],
        [ 'nama_makanan' => 'nasi kuning', 'harga' => 12000, 'jumlah' => 3],
    ];
    $resto = "Gojin Resto makanan penuh lemak";
    // compact fungsinya untuk mengirim collection data array ke view
    // yang di kirim ke view hanya 1 data saja
    return view('menu', compact('data', 'resto')); 
});
// compact fungsinya untuk mengirim collection data array ke view
// yang di kirim ke view hanya 1 data saja

//route parameter (nilai)
Route::get('books/{judul}', function($a,){
    return 'Judul buku : '. $a;   
}); 

Route::get('post/{title}/{category}', function($a, $b){
    //compact fungsinya untuk mengirim collection data array ke view
    return view('post', ['judul' => $a, 'cat' => $b]);  
});

// route optional parameter
Route::get('profil/{name?}', function($a = "Guest"){
    return 'Nama User : ' .$a;
});

// route optional parameter
Route::get('order/{item?}', function($a = "Nasi"){
    return view('order', compact('a'));
});

// latihan 1
Route::get('list', function(){
    $barang = [
        [ 'nama_barang' => 'buku', 'harga' => 15000, 'qty' => 2],
        [ 'nama_barang' => 'pensil', 'harga' => 3000, 'qty' => 1],
        [ 'nama_barang' => 'penggaris', 'harga' => 7000, 'qty' => 3],
    ];
    $toko = "Toko Gojin Jaya";
    return view('list', compact('barang', 'toko')); 
});

// latihan 2
Route::get('nilai/{nama?}/{mapel?}/{nilai?}', function($a = "Guest", $b = "Tidak ada", $c = 0){
    $data = [
        [
            'nama' => $a,
            'mapel' => $b,
            'nilai' => $c
        ]
    ];

    return view('nilai', compact('data'));
});

// latihan 3
Route::get('grading/{nama?}/{nilai?}', function($n = "n", $nilai = "nilai"){
    $angka = [
        [
            'n' => $n,
            'nilai' => $nilai,
        ]
    ];

return view('grading', compact('n', 'nilai'));
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
