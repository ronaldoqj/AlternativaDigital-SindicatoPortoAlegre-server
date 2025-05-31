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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title', 250)->nullable();
            $table->string('subtitle', 300)->nullable();
            $table->string('description', 350)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('phone2', 50)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('address2', 250)->nullable();
            $table->string('mail', 250)->nullable();
            $table->string('site', 250)->nullable();
            $table->string('facebook', 250)->nullable();
            $table->string('instagram', 250)->nullable();
            $table->string('x', 250)->nullable();
            $table->string('whatsapp', 250)->nullable();
            $table->string('youtube', 250)->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_insurances');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
