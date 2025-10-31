<?php
// memanggil class Route
use Illuminate\Support\Facades\Route; // memanggil class Route
use App\Http\Controllers\MyController; // controllernya harus di import dulu / di panggil
use App\Http\Controllers\PostController; // memanggil controller PostController
use App\Http\Controllers\BiodataController; // memanggil controller BiodataController
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


Route::get('/', function(){
    // memanggil view welcome.blade.php
    return view('welcome');
});

// basic 
// menampilkan teks ke browser
Route::get('about', function(){
    // menampilkan teks ke browser
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

// Route::get('post/{title}/{category}', function($a, $b){
//     //compact fungsinya untuk mengirim collection data array ke view
//     return view('post', ['judul' => $a, 'cat' => $b]);  
// });

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

// Test Model 
Route::get('test-model', function(){
    // mengambil semua data dari model Post
    $data = App\Models\Post::all();
    // menampilkan data ke browser
    return $data;
});

Route::get('create-data', function(){
    // membuat data baru
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
    // mengupodate data berdasarkan parameter id
    $data->title = "Membangun Project dengan Laravel";
    // mengirim data ke database
    $data->save();
    // menampilkan data ke browser
    return $data;
});

Route::get('delete-data/{id}', function($id){
    // Menghapus data berdasarkan parameter id
    $data = App\Models\Post::find($id);
    // menghapus data
    $data->delete();
    // di kembalikan (alihkan) ke halaman test-model
    return redirect('test-model');
});

Route::get('search/{cari}', function($query) {
    // Mencari data berdasarkan title yang mirip seperti (like)
    $data = App\Models\Post::where('title', 'like', '%' . $query . '%')->get();
    return $data;
});

// pemanggilan url menggunakan controller
Route::get('greetings', [MyController::class, 'hello']);
Route::get('student', [MyController::class, 'siswa']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post 
Route::get('post', [PostController::class, 'index'])->name('post.index');

// tambah data post
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');

// edit data post
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

// show data
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');

// hapus data
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

//
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//
Route::resource('biodata', App\Http\Controllers\BiodataController::class)->middleware('auth');

//
Route::get('/one-to-one', [RelasiController::class, 'index']);

//
Route::get('/wali-ke-mahasiswa', function () {
    $wali = Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});

//
Route::get('/one-to-many', [RelasiController::class, 'OneToMany']);

//
Route::get('/mahasiswa-ke-dosen', function () {
    $mhs = Mahasiswa::where('nim', '123456')->first();
    return "{$mhs->nama} dibimbim oleh {$mhs->dosen->nama}";
});

//
Route::get('/many-to-many', [HobiController::class, 'manyToMany']);

//
Route::get('eloquent', [RelasiController::class, 'eloquent']);

//
Route::resource('dosen', DosenController::class);

//
Route::resource('hobi', HobiController::class);

//
Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);

//
use App\Http\Controllers\WaliController;

// ... route-route lainnya

Route::resource('wali', WaliController::class);

//


Route::resource('pelanggan', PelangganController::class);
Route::resource('produk', ProdukController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('detail-transaksi', DetailTransaksiController::class);

Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
