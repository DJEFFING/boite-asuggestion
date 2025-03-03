<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->string("vrai_nom")->default("annonyme");
            $table->string("niveau_etude")->default("annonyme");
            $table->string("specialite")->default("annonyme");
            $table->string("filiere")->default("annonyme");
            $table->string("numero_telephone")->default("annonyme");
            $table->string("object")->unique();
            $table->string("description");
            $table->boolean("status")->default(1);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("categorie_id");
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("categorie_id")->references("id")->on("categories")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
