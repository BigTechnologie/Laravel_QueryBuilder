<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Import de l'espace de nom imperatif
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\BlogController;


Route::get('/', [HomeController::class, 'index']); 
Route::get('/about', [HomeController::class, 'about']); 
Route::get('/single-action', SingleActionController::class); 
//Route::resource('/blog', BlogController::class); 





Route::fallback(function () {
    return "Ooops cette page n'existe pas !";
});








