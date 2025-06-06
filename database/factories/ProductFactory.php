<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'price' => rand(100, 500),
        ];
    }
}

// Voir dans le fichier Word la commande qui permet d'executer une factorie sachant qu'on pouvait utiliser faker ou seeders. J'ai utilisé: php artisan make:factory ProductFactory
// Ensuite en ligne de commande: php artisan tinker => puis: \App\Models\Product::factory()→count(30)→create();
// Cela va insérer 30 produits avec des données aléatoires.
