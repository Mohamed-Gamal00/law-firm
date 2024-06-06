<?php

use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\BookingController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\GalleryController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Website\ServiceController;
use App\Http\Controllers\Website\TeamController;
use App\Http\Controllers\Website\VideoGalleryController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('website.home.index');
// });

// Route::get('/', function () {
//     $settings = Setting::first();

//     if (!$settings) {
//         $settings = new Setting();
//     }
//     return view('website.layouts.partials.main-header', compact('settings'));
// });





Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/service/{id}', [ServiceController::class, 'show'])->name('service');

Route::get('/teams', [TeamController::class, 'index'])->name('teams');
Route::get('/teams/member/{id}', [TeamController::class, 'show'])->name('member');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');

Route::get('/booking', [BookingController::class, 'index'])->name('booking');

Route::get('/media-center/news', [NewsController::class, 'index'])->name('news');
Route::get('/media-center/images-gallery', [GalleryController::class, 'index'])->name('galleries');
Route::get('/media-center/videos-gallery', [VideoGalleryController::class, 'index'])->name('videos');


require __DIR__ . '/auth.php';
