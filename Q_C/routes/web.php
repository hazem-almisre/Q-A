<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test_Controller;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('profile')->group(function () {
    Route::get('index', [ProfileController::class, 'index'])->name('in');
    Route::get('create', [ProfileController::class, 'create'])->name('cr');
    Route::post('store', [ProfileController::class, 'store'])->name('st');
    Route::get('show/{id}', [ProfileController::class, 'show'])->name('sh');
    Route::get('edit/{id}', [ProfileController::class, 'edit'])->name('ed');
    Route::post('update/{id}', [ProfileController::class, 'update'])->name('up');
    Route::delete('destroy/{id}', [ProfileController::class, 'destroy'])->name('del');
    Route::get('trash/{id}', [ProfileController::class, 'trash'])->name('tr');
    Route::get('restore/{id}', [ProfileController::class, 'restoretrash'])->name('trre');
    Route::delete('delete/{id}', [ProfileController::class, 'deletetrash'])->name('trdel');
});


Route::group(['middleware' => 'auth', 'prefix' => 'tag'], function () {
    Route::get('index', [TagsController::class, 'index'])->name('tag.in');
    Route::get('create', [TagsController::class, 'create'])->name('tag.cr');
    Route::post('store', [TagsController::class, 'store'])->name('tag.st');
    Route::get('show/{id}', [TagsController::class, 'show'])->name('tag.sh');
    Route::get('edit/{id}', [TagsController::class, 'edit'])->name('tag.ed');
    Route::post('update/{id}', [TagsController::class, 'update'])->name('tag.up');
    Route::delete('destroy/{id}', [TagsController::class, 'destroy'])->name('tag.del');
});

Route::resource('post', 'PostController');
Route::post('comment/store', 'CommentController@store')->name('comment.store');
Route::delete('comment/destroy/{id}', 'CommentController@destroy');
