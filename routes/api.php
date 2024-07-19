<?php

use App\Http\Controllers\Faculties\FacultyController;
use App\Http\Controllers\Galleries\GalleryController;
use App\Http\Controllers\News\NewController;
use App\Http\Controllers\Vacancies\VacancyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function (){
    Route::get('/new',[NewController::class,'getNew']);
    Route::get('/new/{novelty}',[NewController::class,'showNew']);
    Route::get('/event',[NewController::class,'getEvent']);
    Route::get('/graduation-ceremony',[NewController::class,'getGraduation']);
    Route::get('/exchange-program',[NewController::class,'getExchange']);
    Route::get('/vacancy',[VacancyController::class,'getPaginate']);
    Route::get('/faculty',[FacultyController::class,'getPaginate']);
    Route::get('/gallery',[GalleryController::class,'paginate']);
});
