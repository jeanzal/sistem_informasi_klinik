<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\AuthController::class, 'index']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
Route::get('/reset', [App\Http\Controllers\AuthController::class, 'reset'])->name('auth.reset');
Route::post('/forgot', [App\Http\Controllers\AuthController::class, 'forgot'])->name('auth.forgot');
Route::get('/password/{email}/{token}', [App\Http\Controllers\AuthController::class, 'password'])->name('auth.password');
Route::post('/renew', [App\Http\Controllers\AuthController::class, 'renew'])->name('auth.renew');
//Group Admin
Route::group(['middleware'=>'auth:admin'],function (){
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    });
});

//Group Superadmin
Route::group(['middleware'=>'auth:superadmin'],function (){
    Route::prefix('superadmin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Superadmin\DashboardController::class, 'index'])->name('superadmin.dashboard.index');

        //Group pengguna
        Route::get('/pengguna', [App\Http\Controllers\Superadmin\PenggunaController::class, 'index'])->name('superadmin.pengguna.index');
        Route::get('/pengguna/add', [App\Http\Controllers\Superadmin\PenggunaController::class, 'add'])->name('superadmin.pengguna.add');
        Route::post('/pengguna/store', [App\Http\Controllers\Superadmin\PenggunaController::class, 'store'])->name('superadmin.pengguna.store');
        Route::get('/pengguna/edit/{id}', [App\Http\Controllers\Superadmin\PenggunaController::class, 'edit'])->name('superadmin.pengguna.edit');
        Route::post('/pengguna/update', [App\Http\Controllers\Superadmin\PenggunaController::class, 'update'])->name('superadmin.pengguna.update');
        Route::get('/pengguna/delete/{id}', [App\Http\Controllers\Superadmin\PenggunaController::class, 'delete'])->name('superadmin.pengguna.delete');
        Route::get('/pengguna/export', [App\Http\Controllers\Superadmin\PenggunaController::class, 'export'])->name('superadmin.pengguna.export');

       //Group Categori
        Route::get('/kategori', [App\Http\Controllers\Superadmin\CategoryController::class, 'index'])->name('superadmin.kategori.index');
        Route::get('/kategori/add', [App\Http\Controllers\Superadmin\CategoryController::class, 'add'])->name('superadmin.kategori.add');
        Route::post('/kategori/store', [App\Http\Controllers\Superadmin\CategoryController::class, 'store'])->name('superadmin.kategori.store');
        Route::get('/kategori/edit/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'edit'])->name('superadmin.kategori.edit');
        Route::post('/kategori/update', [App\Http\Controllers\Superadmin\CategoryController::class, 'update'])->name('superadmin.kategori.update');
        Route::get('/kategori/delete/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'delete'])->name('superadmin.kategori.delete');

        //Group Product
        Route::get('/produk', [App\Http\Controllers\Superadmin\ProductController::class, 'index'])->name('superadmin.produk.index');
        Route::get('/produk/add', [App\Http\Controllers\Superadmin\ProductController::class, 'add'])->name('superadmin.produk.add');
        Route::post('/produk/store', [App\Http\Controllers\Superadmin\ProductController::class, 'store'])->name('superadmin.produk.store');
        Route::get('/produk/edit/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'edit'])->name('superadmin.produk.edit');
        Route::post('/produk/update', [App\Http\Controllers\Superadmin\ProductController::class, 'update'])->name('superadmin.produk.update');
        Route::get('/produk/delete/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'delete'])->name('superadmin.produk.delete');

        //Group Pasien
        Route::get('/pasien', [App\Http\Controllers\Superadmin\PasienController::class, 'index'])->name('superadmin.pasien.index');
        Route::get('/pasien/add', [App\Http\Controllers\Superadmin\PasienController::class, 'add'])->name('superadmin.pasien.add');
        Route::post('/pasien/store', [App\Http\Controllers\Superadmin\PasienController::class, 'store'])->name('superadmin.pasien.store');
        Route::get('/pasien/edit/{id}', [App\Http\Controllers\Superadmin\PasienController::class, 'edit'])->name('superadmin.pasien.edit');
        Route::post('/pasien/update', [App\Http\Controllers\Superadmin\PasienController::class, 'update'])->name('superadmin.pasien.update');
        Route::get('/pasien/delete/{id}', [App\Http\Controllers\Superadmin\PasienController::class, 'delete'])->name('superadmin.pasien.delete');

        //Group transcation
        Route::get('/transaction', [App\Http\Controllers\Superadmin\TransactionController::class, 'index'])->name('superadmin.transaction.index');
        Route::get('/transaction/add', [App\Http\Controllers\Superadmin\TransactionController::class, 'add'])->name('superadmin.transaction.add');
        Route::get('/transaction/detail/{id}', [App\Http\Controllers\Superadmin\TransactionController::class, 'detail'])->name('superadmin.transaction.detail');
        Route::post('/transaction/store', [App\Http\Controllers\Superadmin\TransactionController::class, 'store'])->name('superadmin.transaction.store');
        Route::get('/transaction/print/{id}', [App\Http\Controllers\Superadmin\TransactionController::class, 'print'])->name('superadmin.transaction.print');

        //Grup Dokter
        Route::get('/dokter', [App\Http\Controllers\Superadmin\DokterController::class, 'index'])->name('superadmin.dokter.index');


        //Grup Pemmbayaran
        Route::get('/pembayaran', [App\Http\Controllers\Superadmin\PembayaranController::class, 'index'])->name('superadmin.pembayaran.index');

    });
});

Route::get('download/{filename}', function($filename) {
    $file_path = storage_path('app/public/' . $filename);
    if (file_exists($file_path)) {
        return Response::download($file_path, $filename, ['Content-Length: ' . filesize($file_path)]);
    } else {
        exit('File yang ada request tidak ditemukan di server kami!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+')->name('download_file');


Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage_file');
