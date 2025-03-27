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
        Schema::create('notificationclients', function (Blueprint $table) {
            $table->id('idNotif');
            $table->unsignedBigInteger('idExpediteur');
            $table->foreign('idExpediteur')->references('idAd')->on('administrateurs')->onDelete('cascade');
            $table->unsignedBigInteger('idDestinataire');
            $table->foreign('idDestinataire')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificationclients');
    }
};
