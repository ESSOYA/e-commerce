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
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->id('idAd');
            $table->string('nomAd', 100);
            $table->string('prenomAd', 100);
            $table->string('mailAd', 250)->unique();
            $table->string('passwordAd', 50); // À remplacer par password()
            $table->string('photoAd', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrateurs');
    }
};
