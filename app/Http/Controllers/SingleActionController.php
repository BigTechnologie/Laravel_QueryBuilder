<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    /**
     * Handle the incoming request. // Gérer la demande entrante.
     */
    public function __invoke(Request $request)
    {
        //
        return "Ceci est un Single Action Controller";
    }
}
