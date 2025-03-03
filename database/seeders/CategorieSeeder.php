<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie1 =["titre" => "education"];
        $categorie2 =["titre" => "sport"];
        $categorie3 =["titre" => "infrasstructure"];
        $categorie4 =["titre" => "cours"];
        $categorie5 =["titre" => "pleinte"];


        Categorie::create($categorie1);
        Categorie::create($categorie2);
        Categorie::create($categorie3);
        Categorie::create($categorie4);
        Categorie::create($categorie5);



    }
}
