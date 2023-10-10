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
        Schema::create('bank_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id')->unsigned();
            $table->unsignedBigInteger('bank_id')->unsigned();

            $table->foreign('news_id')->references('id')->on('news');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_news');
    }
};
