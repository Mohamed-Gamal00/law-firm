<?php

use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\BookingController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\GalleryController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Website\BlogPostController;
use App\Http\Controllers\Website\EmailController;
use App\Http\Controllers\Website\ServiceController;
use App\Http\Controllers\Website\TeamController;
use App\Http\Controllers\Website\VideoGalleryController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/service/{id}', [ServiceController::class, 'show'])->name('service');

Route::get('/teams', [TeamController::class, 'index'])->name('teams');
Route::get('/teams/member/{id}', [TeamController::class, 'show'])->name('member');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');


Route::post('/subscribe', [EmailController::class, 'store'])->name('email.store');


Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/blogs', [BlogPostController::class, 'index'])->name('blogs');
Route::get('/blogs/blog/{id}', [BlogPostController::class, 'show'])->name('show-blog-details');

Route::get('/media-center/news', [NewsController::class, 'index'])->name('news');
Route::get('/media-center/news/show-new-details/{id}', [NewsController::class, 'show'])->name('show-new-details');
Route::get('/media-center/images-gallery', [GalleryController::class, 'index'])->name('galleries');
Route::get('/media-center/videos-gallery', [VideoGalleryController::class, 'index'])->name('videos');

// Route::get('/blogs/blog/{id}', [SocialShareButtonsController::class, 'ShareWidget']);
require __DIR__ . '/auth.php';
