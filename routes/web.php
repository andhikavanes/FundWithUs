<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/login', [logincontroller::class, 'login'])->name('login');
Route::post('/login', [logincontroller::class, 'loginpost'])->name('login.post');
Route::post('/logout', [logincontroller::class, 'logout']);

Route::get('/register', [logincontroller::class, 'register'])->name('register');
Route::post('/register', [logincontroller::class, 'registerpost'])->name('register.post');


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.detail');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// routes/web.php



Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi.index');


Route::get('/donasi-baru', function () {
    return view('donasi-baru');
})->name('donasi-baru');

Route::get('donasi/payment/{catalog}',[PaymentController::class,'index'])->name('payment.index');
Route::post('donasi/show/',[PaymentController::class,'show'])->name('payment.show');
Route::post('donasi/create/',[PaymentController::class,'create'])->name('payment.create');

Route::get('/catalogs', [DonasiController::class, 'index'])->name('catalogs.index');