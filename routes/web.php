<?php

use App\Http\Controllers\Dashboard\BookingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\customizesite\AboutContentController;
use App\Http\Controllers\Dashboard\customizesite\AboutFeatureController;
use App\Http\Controllers\Dashboard\customizesite\BlogContentController;
use App\Http\Controllers\Dashboard\customizesite\CustomerOpinionController;
use App\Http\Controllers\Dashboard\customizesite\MainpageContentController;
use App\Http\Controllers\Dashboard\customizesite\MediacenterContentController;
use App\Http\Controllers\Dashboard\customizesite\ServiceContentController;
use App\Http\Controllers\Dashboard\customizesite\TeamContentController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\PhotoController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function () {
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('news', NewsController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('photos', PhotoController::class);
        Route::resource('videos', VideoController::class);
        // Route::resource('settings', SettingController::class);

        Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        Route::get('all-booking', [BookingController::class, 'index'])->name('booking.index');
        Route::delete('all-booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        /* تخصيص الموقع */
        /* main page */
        Route::resource('main-page', MainpageContentController::class);

        /* about-us */
        Route::get('about-us', [AboutContentController::class, 'index'])->name('about-us.index');
        Route::put('about-us', [AboutContentController::class, 'update'])->name('about-us.update');

        Route::resource('featuers', AboutFeatureController::class);

        /* media center */
        Route::get('media-center', [MediacenterContentController::class, 'index'])->name('media-center.index');
        Route::put('media-center', [MediacenterContentController::class, 'update'])->name('media-center.update');

        /* services */
        Route::get('service-content', [ServiceContentController::class, 'index'])->name('service-content.index');
        Route::put('service-content', [ServiceContentController::class, 'update'])->name('service-content.update');

        /* teamcontent */
        Route::get('team-content', [TeamContentController::class, 'index'])->name('team-content.index');
        Route::put('team-content', [TeamContentController::class, 'update'])->name('team-content.update');

        /* customer-opinion */
        Route::resource('customer-opinion', CustomerOpinionController::class);
        /* blog content */
        Route::get('blog-content', [BlogContentController::class, 'index'])->name('blog-content.index');
        Route::put('blog-content', [BlogContentController::class, 'update'])->name('blog-content.update');
    });
});

require __DIR__ . '/auth.php';
