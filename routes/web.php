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

// Fait le jeudi avec vous: Query Builder (générateur de requête)
Route::get('/update-user', [HomeController::class, 'updateUser']);
Route::get('/delete-user', [HomeController::class, 'deleteUserByIdUser']);
Route::get('/delete-multiple-users', [HomeController::class, 'deleteUsersGreaterThanOne']);

// Jai ajouté cette partie: Query Builder (générateur de requête) 

Route::get('/blog-titles', [HomeController::class, 'getTitles']);
Route::get('/test-aggregates', [HomeController::class, 'testAggregates']);
Route::get('/test-aggregatesView', [HomeController::class, 'testAggregatesView']);






Route::fallback(function () {
    return "Ooops cette page n'existe pas !";
});








