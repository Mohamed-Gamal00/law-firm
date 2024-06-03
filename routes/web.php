<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\customizesite\AboutContentController;
use App\Http\Controllers\Dashboard\customizesite\MainpageContentController;
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

Route::get('/admin', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

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
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        /* تخصيص الموقع */
        /* main page */
        Route::resource('main-page', MainpageContentController::class);

        /* about-us */
        Route::get('about-us', [AboutContentController::class, 'index'])->name('about-us.index');
        Route::put('about-us', [AboutContentController::class, 'update'])->name('about-us.update');


    });
});

require __DIR__.'/auth.php';
