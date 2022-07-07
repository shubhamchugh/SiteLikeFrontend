<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\PostPageController;
use App\Http\Controllers\Frontend\ContentPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomePageController::class, 'index'])->name('home.index');

Route::get('/page/{post:slug}', [ContentPageController::class, 'index'])->name('page.show');

if (Schema::hasTable('nova_settings')) {

    Route::get((!empty(nova_get_setting('permalink_prefix')) ? nova_get_setting('permalink_prefix') : "") . '/{post:slug}', [PostPageController::class, 'index'])->name('post.show');
}
