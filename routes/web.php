<?php

use App\Http\Controllers\ShowProductController;
use App\Models\User;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Support\Number;
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
Route::post('/posts/{post}/like', [PostController::class, 'addLikeToPost'])->name('post.like');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/{id}', ShowProductController::class)->name('products.show');

Route::get('/numberHelpers', function () {
    $number = Number::abbreviate(1000);
    return response()->json([
        'number' => $number,
    ]);
});


//*USER BIRTHDAY
// Route::get('/usersBirthday', function () {
//     foreach (User::all() as $user) {
//         if ($user->birth_date->isBirthday()) {
//             return response()->json([
//                 'email' => $user->email
//             ]);
//         }
//     }
// });

// Route::get('usersBirthdayFilter', function () {
//     $users = User::all()->filter(function (User $user) {
//         return $user->birth_date->isBirthday();
//     });
//     return $users->pluck('email');
// });

// Route::get('/usersBirthday', function () {
//     return User::query()
//         ->whereRaw('MONTH(birth_date) = ' . now()->month)
//         ->whereRaw('DAY(birth_date) = ' . now()->day)
//         // ->get();
//         ->pluck('email');
// });

// Route::get('/usersBirthday', function () {
//     return User::query()
//         ->whereMonth('birth_date', now()->month)
//         ->whereDay('birth_date', now()->day)
//         // ->get();
//         ->pluck('email');
// });

Route::get('/usersBirthday', function () {
    // $today = today();
    $today = Carbon::create('2024-12-30');
    $curdate = $today->toDateString();

    $untilDay = $today->copy()->addDays(7)->dayOfYear;
    if ($today->dayOfYear < $untilDay) {
        $users = User::query()
            ->whereRaw('DAYOFYEAR("'.$curdate.'") <= DAYOFYEAR(birth_date)
                AND DAYOFYEAR("'.$curdate.'") + 7 >= DAYOFYEAR(birth_date)')
                // ->get()
                ->pluck('email');
        return $users;
    } else {
        $users = User::query()
            ->whereRaw('DAYOFYEAR("'.$curdate.'") <= DAYOFYEAR(birth_date)
                AND 366 >= DAYOFYEAR(birth_date)')
                ->orWhereRaw('DAYOFYEAR(birth_date) <= ' . $untilDay)
                // ->get()
                ->pluck('email');
        return $users;
    }
});

