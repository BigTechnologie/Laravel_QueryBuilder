<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {  
        //dd("working"); // Resultat: app\Http\Middleware\CheckRoleMiddleware.php (Cela montre que la requête passe par la méthode handle() avant d’arriver à la route.)
        $user = User::findOrFail($request->user_id);
        if ($user->role === 'admin') {
            return $next($request);
        }
        abort(403);   
    }
    

    /*
    //4- Middleware - Paramètres du middleware // La partie 4 dans web.php fonctionne en modifiant la fonction hundle()
    public function handle(Request $request, Closure $next, $role)
    {
        //dd($role); // affichera "admin" ou "user"

        // Récupère l'id dans l'URL, ex: /dashboard/user?id=2
        $id = $request->query('id');

        if (!$id) { // Si aucun id n’est fourni, on bloque l’accès (erreur 403)
            abort(403);
        }

        // On cherche l’utilisateur avec cet id
        $user = User::find($id);

        // Si l’utilisateur n’existe pas OU si son rôle ne correspond pas au rôle exigé, on refuse l’accès
        if (!$user || $user->role !== $role) {
            abort(403, 'Access Denied');
        }

        // Sinon on continue vers la route demandée
        return $next($request);

        // Tester la route User : http://localhost:8000/dashboard/user?id=2    => Il faut que l’utilisateur avec ID 2 ait un champ role = 'user'.

        // Tester la route Admin : http://localhost:8000/dashboard/admin?id=1  => Il faut que l’utilisateur avec ID 1 ait un champ role = 'admin'.  

    }

    */

}
