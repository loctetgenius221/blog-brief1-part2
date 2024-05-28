<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Commentaire;
use Faker\Factory as Faker;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $articles = Article::all();

        foreach ($articles as $article) {
            for ($i = 0; $i < 10; $i++) {
                Commentaire::create([
                    'article_id' => $article->id,
                    'contenu' => $faker->paragraph,
                    'nom_complet_auteur' => $faker->name,
                    'date_heure_crephp artisan make:controller CommentaireController
                    ation' => $faker->datetime,

                ]);
            }
        }
    }
}
