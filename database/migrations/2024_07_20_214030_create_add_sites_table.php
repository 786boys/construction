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
        Schema::create('add_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('siteOwner');
            $table->string('siteIncharge');
            $table->string('superVisor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_sites');
    }
};
