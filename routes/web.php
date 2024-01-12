<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/sortBy', function () {
    $collection = collect([
        ['name' => 'Desk', 'price' => 200],
        ['name' => 'Chair', 'price' => 100],
        ['name' => 'Bookcase', 'price' => 150],
    ]);

    $sorted = $collection->sortBy('price');

    return $sorted->values()->all();
});

Route::get('/authors', function () {
    $authors = Author::with('books')->get();

    return $authors;
});


Route::get('/posts', [PostController::class, "index"]);
Route::get('/create', [PostController::class, "create"]);
Route::post('/store', [PostController::class, "store"]);


Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
