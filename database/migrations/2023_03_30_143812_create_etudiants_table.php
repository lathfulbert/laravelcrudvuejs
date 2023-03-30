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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->char('sexe');
            $table->integer('age');
            $table->foreignId('niveau_scolaire_id')->constrained();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table(function (Blueprint $table) {
            $table->dropConstrainedForeignId("niveau_scolaire_id");// supprime la contrainte pour eviter un bug
        });
        Schema::dropIfExists('etudiants');
    }
};
