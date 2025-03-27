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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idProd');
            $table->string('nomProd', 100);
            $table->string('description', 250);
            $table->integer('quantite')->default(1);
            $table->decimal('prix', 10, 0);
            $table->timestamps();

            $table->unsignedBigInteger('idCat');
            $table->foreign('idCat')
            ->references('idCat')
            ->on('categories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
