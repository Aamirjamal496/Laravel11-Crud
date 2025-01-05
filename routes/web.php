<?php

use App\Http\Controllers\ProductsController;
use App\Models\Product;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $products = Product::orderBy('created_at','DESC')->get();
    return view('dashboard',['products'=>$products]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Product Routes
    Route::get('/AddForm',[ProductsController::class,'index'])->name('Product.Add');
    Route::post('/storeProduct',[ProductsController::class,'storeProduct'])->name( 'Product.Store');
    Route::get('/products/{product}/edit', [ProductsController::class, 'editProduct'])->name('products.edit');
});
// Route::get('/editProduct',[ProductsController::class,'editProduct']);

require __DIR__.'/auth.php';
