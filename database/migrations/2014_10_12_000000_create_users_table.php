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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('role_id');

            $table->string('nom_societe');
            $table->string('siege_social');
            $table->longText('description');

            $table->string('pays');
            $table->string('ville');

            $table->string('prenom');
            $table->string('nom');

            $table->string('t_contact');
            $table->string('telephone');
            
            $table->string('logo');
            $table->string('image');
            $table->boolean('valider')->nullable();

            $table->string('code_postal');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};


