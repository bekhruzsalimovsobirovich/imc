<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Faculties\FacultyController;
use App\Http\Controllers\Galleries\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewController;
use App\Http\Controllers\Vacancies\VacancyController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//---------------------------------------------------------------  ADMIN START -------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:sanctum']], function () {
    Route::get('index', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('novelties',NewController::class);
    Route::resource('vacancies',VacancyController::class);
    Route::resource('faculties',FacultyController::class);
    Route::get('galleries',[GalleryController::class,'index'])->name('galleries.index');
    Route::get('galleries/create',[GalleryController::class,'create'])->name('galleries.create');
    Route::post('galleries',[GalleryController::class,'store'])->name('galleries.store');
    Route::delete('galleries/{gallery}',[GalleryController::class,'destroy'])->name('galleries.destroy');
});
//---------------------------------------------------------------  ADMIN END -----------------------------------------------------------------------------------------------------
