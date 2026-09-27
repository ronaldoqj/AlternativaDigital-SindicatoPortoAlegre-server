<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 140);
            $table->string('last_name', 180)->nullable();
            $table->string('role_name', 140)->nullable();
            $table->unsignedBigInteger('director_category_id');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('director_category_id')->references('id')->on('director_categories');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('image_id')->references('id')->on('files');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};
