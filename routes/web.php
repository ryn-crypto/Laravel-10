<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtrakurikulerController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\AuthController;

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
})->middleware('auth');

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
Route::prefix('/students')->group(function () {
    Route::get('', [StudentController::class, 'index'])->middleware('auth');
    Route::get('/add', [StudentController::class, 'create'])->middleware(['auth', 'must.admin-or-teacher']);
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->middleware('auth');
    Route::post('/update/{id}', [StudentController::class, 'update'])->middleware('auth');
    Route::get('/delete/{id}', [StudentController::class, 'delete'])->middleware(['auth', 'must.admin']);
    Route::get('/deleted', [StudentController::class, 'deletedStudents'])->middleware('auth');
    Route::get('/{id}/restore', [StudentController::class, 'restore'])->middleware('auth');
    Route::get('/nilai', [StudentController::class, 'nilai'])->middleware('auth');
    Route::get('/{id}', [StudentController::class, 'show'])->middleware(['auth', 'must.admin-or-teacher']);
});

// route login
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');

// logout route
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

// route untuk tambah data student
Route::post('insert', [StudentController::class, 'store'])->middleware('auth');

// route untuk class
Route::get('/class', [ClassController::class, 'index'])->middleware('auth');

// route untuk controller ekstrakurikuler
Route::get('/extrakurikuler', [ExtrakurikulerController::class, 'index'])->middleware('auth');

// route untuk controller teachers
Route::get('/teachers', [TeachersController::class, 'index'])->middleware('auth');
