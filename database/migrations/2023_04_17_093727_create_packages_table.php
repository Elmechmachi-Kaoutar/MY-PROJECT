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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            $table->string('prix')->nullable();
            $table->string('type')->nullable();

            $table->string('nb_offre')->nullable();
            $table->string('support')->nullable();
            $table->string('email')->nullable();
            $table->string('delivery')->nullable();
            $table->string('nb_candidat')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
