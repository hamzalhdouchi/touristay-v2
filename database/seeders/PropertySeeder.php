<?php

namespace Database\Seeders;

use App\Models\properties;
use Illuminate\Database\Seeder;
use App\Models\Property; // Import du modèle
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Créez 10 propriétés en utilisant le modèle Eloquent
        for ($i = 0; $i < 10; $i++) {
            properties::create([
                'titre' => $faker->sentence,
                'description' => $faker->paragraph,
                'prix_par_nuit' => $faker->numberBetween(50, 500),
                'caution' => $faker->numberBetween(100, 300),
                'chambres' => $faker->numberBetween(1, 5),
                'salles_de_bain' => $faker->numberBetween(1, 3),
                'adresse' => $faker->address,
                'ville' => $faker->city,
                'code_postal' => $faker->postcode,
                'disponibilite' => $faker->date(),
                'image' => 'example.jpg', // Vous pouvez remplacer ceci par un vrai chemin d'image
                'user_id' => 1,
            ]);
        }
    }
}
