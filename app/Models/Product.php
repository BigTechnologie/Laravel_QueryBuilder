<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
}

// php artisan make:model Product -m 
// Cette commande crée à la fois : un modèle Product, et une migration associée grâce au flag -m. => une fois executer la commande => voir le fichier de migration 
// Executer la migration: php artisan migrate

