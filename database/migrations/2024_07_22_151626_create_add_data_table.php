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
        Schema::create('add_data', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('user');
            $table->string('paymentType');
            $table->string('expence');
            $table->string('description');
            $table->integer('amount');
            $table->date('custom_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_data');
    }
};
