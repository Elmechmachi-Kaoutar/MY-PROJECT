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
        Schema::create('info_candidats', function (Blueprint $table) {
            
            $table->id();
            $table->string('niveau_etude');
            $table->string('niveau_experience');
            $table->string('secteur_actuel');
            $table->string('remuneration_actuelle');
            $table->string('cv');
            $table->string('lettre_motivation');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_candidats');
    }
};
