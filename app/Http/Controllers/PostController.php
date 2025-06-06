<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\CheckRoleMiddleware;




class PostController extends Controller 
//class PostController extends Controller implements HasMiddleware // Rajouter implements la partie : 5- Middleware - Middleware du contrôleur
{
    /*
    public static function middleware(): array
    {
        return [
            //new Middleware(CheckRoleMiddleware::class), // Ici le Middleware s'applique à toutes les méthodes du controller
            //new Middleware(CheckRoleMiddleware::class, only: ['store']), // Cela veut dire : applique le middleware uniquement à la méthode store.
            new Middleware(CheckRoleMiddleware::class, except: ['index']), // Cela applique le middleware à toutes les méthodes sauf index().
        ];

    }
    */

    public function index()
    {
        return view('post.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}
