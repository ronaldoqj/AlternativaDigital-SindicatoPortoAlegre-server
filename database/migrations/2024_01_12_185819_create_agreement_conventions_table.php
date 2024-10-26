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
        Schema::create('agreement_conventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->year('year')->nullable();
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files');
            $table->foreign('category_id')->references('id')->on('category_agreement_conventions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreement_conventions');
    }
};
