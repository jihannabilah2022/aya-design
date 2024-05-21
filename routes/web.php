<?php

// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\AboutUsController;
// use App\Http\Controllers\ShopController;
// use App\Http\Controllers\OrderController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\AuthController;

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::get('/',[HomeController::class, 'index'])->name('home');
// Route::get('/aboutUs',[AboutUsController::class, 'index'])->name('about_us');
// Route::get('/go-shoping',[ShopController::class, 'index'])->name('go_shopping');
// Route::get('/pesan/{id}', [ShopController::class, 'showPemesanan'])->name('pesan');
// Route::post('/order', [OrderController::class, 'store'])->name('order.store');
// Route::get('/cart',[ShopController::class, 'showCart'])->name('cart');
// Route::delete('/cart/{id}',[ShopController::class, 'removeCart'])->name('cart.remove');
// Route::get('/detail/{id}', [ShopController::class, 'showCartDetail'])->name('cart.detail');





// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     \App\Http\Middleware\RedirectIfAuthenticated::class, // Tambahkan middleware RedirectIfAuthenticated di sini
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('user.dashboard');
//     })->name('dashboard');
// });




use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;



    // Rute untuk autentikasi

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Rute untuk halaman utama dan informasi
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutUs', [AboutUsController::class, 'index'])->name('about_us');
Route::get('/faq', [AboutUsController::class, 'faq'])->name('faq');
Route::get('/how_to_order', [AboutUsController::class, 'how_to_order'])->name('how_to_order');



// Rute untuk berbelanja dan pesanan
Route::get('/go-shopping', [ShopController::class, 'index'])->name('go_shopping');
Route::get('/pesan/{id}', [ShopController::class, 'showPemesanan'])->name('pesan');

// Rute untuk Checkout
Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout');

// Rute untuk penanganan pesanan dengan autentikasi
Route::middleware('auth')->group(function () {
    Route::post('/order', [ShopController::class, 'store'])->name('order.store');
    Route::get('/cart', [ShopController::class, 'showCart'])->name('cart');
    Route::delete('/cart/{id}', [ShopController::class, 'removeCart'])->name('cart.remove');
    Route::get('/detail/{id}', [ShopController::class, 'showCartDetail'])->name('cart.detail');
});



Route::middleware(['auth:sanctum, admin',
    config('jetstream.auth_session'),
    'verified',
    \App\Http\Middleware\RedirectIfAuthenticated::class, // Tambahkan middleware RedirectIfAuthenticated di sini
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('server.home');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    \App\Http\Middleware\RedirectIfAuthenticated::class, // Tambahkan middleware RedirectIfAuthenticated di sini
])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});


Route::prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::put('transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});



// Rute untuk dashboard pengguna setelah login
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('user.dashboard');
//     })->name('dashboard');
// });
