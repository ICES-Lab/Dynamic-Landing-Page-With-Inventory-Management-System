<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ViewController::class,'home']);

Route::get('/{slug}', [ViewController::class,'main_pages'])->name('mainpage');

Route::get('/{main_slug}/{sub_slug}', [ViewController::class, 'sub_pages'])->name('subpage');

// Route::get('/incharges', function () {return view('faculties');});

// Route::get('/incharge', function () {return view('faculty');});

// Route::get('/awards', function () {return view('awards');});

// Route::get('/award', function () {return view('single_award');});

// Route::get('/products', function () {return view('products');});

// Route::get('/product', function () {return view('single_product');});

// Route::get('/skills', function () {return view('skills');});

// Route::get('/skill', function () {return view('single_skill');});

// Route::get('/collaborations', function () {return view('collaborators');});

// Route::get('/collaboration', function () {return view('single_collaborator');});