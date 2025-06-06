<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Import de l'espace de nom imperatif
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;


Route::get('/', [HomeController::class, 'index']); 
Route::get('/about', [HomeController::class, 'about']); 
Route::get('/single-action', SingleActionController::class); 
//Route::resource('/blog', BlogController::class); 

// Fait le jeudi avec vous: Query Builder (générateur de requête)
Route::get('/update-user', [HomeController::class, 'updateUser']);
Route::get('/delete-user', [HomeController::class, 'deleteUserByIdUser']);
Route::get('/delete-multiple-users', [HomeController::class, 'deleteUsersGreaterThanOne']);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Jai ajouté cette partie: Query Builder (générateur de requête) 

Route::get('/blog-titles', [HomeController::class, 'getTitles']);
Route::get('/test-aggregates', [HomeController::class, 'testAggregates']);
Route::get('/test-aggregatesView', [HomeController::class, 'testAggregatesView']);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Les Middlewares:
// 1- Middleware mondial (Global Middleware)
/*
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
*/

/*
// 2- Middleware - Groupes de middlewares
Route::get('/', function () {
    return view('welcome');
})->middleware('testGroup');
*/


// 3- Middleware - Alias ​​du middleware
/*
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('checkRole');
*/

// 4- Middleware - Paramètres du middleware  //////////////////////  IL FAUT ALLER MODIFIER : class CheckRoleMiddleware =>  public function handle(Request $request, Closure $next, $role)
Route::get('/dashboard/user', function () {
    //return "User Dashboard";
    dd("User Dashboard");
})->middleware('checkRole:user');

Route::get('/dashboard/admin', function () {
    //return "Admin Dashboard";
    dd("Admin Dashboard");
})->middleware('checkRole:admin');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 5- Middleware - Middleware du contrôleur
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('checkRole');




Route::fallback(function () {
    return "Ooops cette page n'existe pas !";
});








