<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        /*
        // Creation de nouvelle données
        $data = [
            'name' => 'Bruno Guerin',
            'email' => 'b@dawan.fr',
            'password' => Hash::make('admin')
        ];

        if(!DB::table('users')->where('email', $data['email'])->exists()) {
            DB::table('users')->insert($data);
        }

        return view('welcome');
        */

        // // Recuperer par son ID
        // $users = DB::table('users')->where('id', 1)->first();
        // return $users;
        
        // // Recuperer par son email
        // $users = DB::table('users')
        //     ->where('email', 'b@dawan.fr')
        //     ->where('id', 1)
        //     ->first(); // Permet de renvoyer un seul utilisateur
        // return $users;

        $users = DB::table('users')
            ->where('id', '<', 2)
            ->get(); // Renvoie tous les utilisateurs

        return $users;



    }

     public function about()
    {

        return view('about.about');
    }

    public function updateUser()
    {

        $updated = DB::table('users')
        ->where('id', 1)
        ->update([
            'name' => 'John Doe',
            'email' => 'johndoe@exemple.fr'
        ]);

        if($updated) {
          return response()->json(['message' => 'Utilisateur mis à jour avec succès !']);
        }else {
            return response()->json(['message' => 'Aucune modification éffectée !']);
        }
    }

    public function deleteUserByIdUser()
    {
        $deleted = DB::table('users')
            ->where('id', 1)
            ->delete();

        if($deleted) {
            return response()->json(['message' => 'Utilisateur supprimé avec succès !']);
        } else {
            return response()->json(['message' => 'Aucune ligne trouvée à supprimer !']);
        }
       
    }

   // Jai ajouté cette partie: Query Builder (générateur de requête) 

public function deleteUsersGreaterThanOne()
    {
        // Suppression de tous les utilisateurs dont l'ID est > 1
        $deleted = DB::table('users')
            ->where('id', '>', 1)
            ->delete();

        return response()->json([
            'message' => "$deleted utilisateur(s) supprimé(s) dont l'ID est supérieur à 1."
        ]);
    }

    // Récupération d'une liste de valeurs de colonnes
    public function getTitles()
    {
        // Méthode 1 : collection d'objets
        $titles = DB::table('blogs')->select('title')->get();
        //dd($titles); // Renvoie une Collection d'objets avec uniquement le champ "title"

        // Méthode 2 : collection de chaînes de caractères // Utiliser pluck() pour obtenir une seule colonne plus simplement.
        $titlesOnly = DB::table('blogs')->pluck('title');
        //dd($titlesOnly); // Résultat : une Collection contenant uniquement les titres (pas d’objet complet).

        // Convertir en tableau PHP natif
        $titlesArray = DB::table('blogs')->pluck('title')->toArray();
        //dd($titlesArray); // Convertit la Collection en array PHP classique

        // Méthode 3 : tableau associatif ID => titre
        $titlesById = DB::table('blogs')->pluck('title', 'id'); // Convertit la Collection en array PHP classique
        //dd($titlesById); // Cela renverra un tableau associatif où : Les id sont les clés. Les title sont les valeurs

        // Exemple de retour 
        return response()->json([
            'objects' => $titles,
            'titles' => $titlesOnly,
            'assoc_array' => $titlesById
        ]);
    }

    // Agrégats (Aggregates) 
    public function testAggregates()
    {
        $totalProducts = DB::table('products')->count();
        //dd($totalProducts); // 1. Compter les lignes. Affiche : 30 si on a bien inséré 30 produits.
        $maxPrice = DB::table('products')->max('price'); // 2. Valeur maximale. Retourne le prix le plus élevé de la table.
        $minPrice = DB::table('products')->min('price'); // 3. Valeur minimale. Retourne le prix le plus bas.
        $sumPrice = DB::table('products')->sum('price'); // 4. Somme de tous les prix. Donne le total de tous les prix dans la table.
        $avgPrice = DB::table('products')->avg('price'); // 5. Moyenne des prix. Affiche la moyenne des prix. Très utile par exemple pour afficher la note moyenne d’un produit.

        return response()->json([
            'total_products' => $totalProducts,
            'max_price' => $maxPrice,
            'min_price' => $minPrice,
            'sum_price' => $sumPrice,
            'average_price' => round($avgPrice, 2), // Optionnel : arrondi à 2 décimales
        ]);
    }

    public function testAggregatesView()
    {
        $totalProducts = DB::table('products')->count();
        $maxPrice = DB::table('products')->max('price');
        $minPrice = DB::table('products')->min('price');
        $sumPrice = DB::table('products')->sum('price');
        $avgPrice = DB::table('products')->avg('price');

        return view('aggregates', [
            'totalProducts' => $totalProducts,
            'maxPrice' => $maxPrice,
            'minPrice' => $minPrice,
            'sumPrice' => $sumPrice,
            'avgPrice' => round($avgPrice, 2),
        ]);
    }




}

