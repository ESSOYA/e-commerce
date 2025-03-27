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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id('idLivraison');
            $table->dateTime('dateVoulue');
            $table->dateTime('dateLivree')->nullable();
            $table->string('quartier', 250);
            $table->string('statutLivraison', 100)->default('En cours');
            $table->timestamps();

            $table->unsignedBigInteger('idLiv');
            $table->foreign('idLiv')->references('idLiv')->on('livreurs')->onDelete('cascade');

            $table->unsignedBigInteger('idCom');
            $table->foreign('idCom')->references('idCom')->on('commandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
