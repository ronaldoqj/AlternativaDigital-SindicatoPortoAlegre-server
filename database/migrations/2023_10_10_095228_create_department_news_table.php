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
        Schema::create('department_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id')->unsigned();
            $table->unsignedBigInteger('department_id')->unsigned();

            $table->foreign('news_id')->references('id')->on('news');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_news');
    }
};
