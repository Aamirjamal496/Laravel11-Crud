<?php

use App\Http\Controllers\ProductsController;
use App\Models\Product;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    $products = Product::orderBy('created_at', 'DESC')->get();
    return view('dashboard', ['products' => $products]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Product Routes
    Route::get('/AddForm', [ProductsController::class, 'index'])->name('Product.Add');
    Route::post('/storeProduct', [ProductsController::class, 'storeProduct'])->name('Product.Store');
    Route::get('/products/{product}/edit', [ProductsController::class, 'editPr'])->name('product.edit');
    Route::put('/products/{product}', [ProductsController::class, 'updateProduct'])->name('product.update');
    Route::delete('/products/{product}', [ProductsController::class, 'deleteProduct'])->name('product.delete');



    Route::get('/about', [ProductsController::class, 'About'])->name('About');
    Route::get('/contact', [ProductsController::class, 'Contact'])->name('Contact');
    Route::post('/send', [ProductsController::class, 'contactUs'])->name('Message.send');
    Route::get('/messages',[ProductsController::class,"showMessages"])->name('Messages.show');
    Route::delete('/messages/{message}',[ProductsController::class,"deleteMessage"])->name('Message.delete');
});

require __DIR__ . '/auth.php';