<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;

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
    return view('home', [
        'name' => 'riyan',
        'role' => 'test',
        'buah' => ['semangka', 'nanas', 'pisang', 'mangga', 'jambu', 'jeruk']
    ]);
});

// Route::get('/about', function () {
//     return view('about', ['name' => 'riyan', 'phone' => '0812xxxxx']`);
// });

Route::get('/about', function () {
    return view('about');
});

// route with paramater
Route::get('/product/{id}', function ($id) {
    return view('product.detail', ['id' => $id]);
});

// lebih mudah menggunakan prefix (pengelompokan url)
// Route::get('admin/profile-admin', function () {
//     return ('profile admin');
// });

// Route::get('admin/about-admin', function () {
//     return ('about admin');
// });

// Route::get('admin/contact-admin', function () {
//     return ('contact admin');
// });


// berikut penggunakan prefix 
Route::prefix('administrator')->group(function () {
    Route::get('/profile admin', function () {
        return ('profile admin');
    });

    Route::get('/about-admin', function () {
        return ('about admin');
    });

    Route::get('/contact-admin', function () {
        return ('contact admin');
    });
});

// route untuk controller students
Route::get('/students', [StudentController::class, 'index']);

// route untuk controller class
Route::get('/class', [ClassController::class, 'index']);
