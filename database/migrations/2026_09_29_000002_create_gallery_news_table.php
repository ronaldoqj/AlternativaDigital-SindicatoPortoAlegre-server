<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained('galleries')->cascadeOnDelete();
            $table->foreignId('news_id')->constrained('news')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['gallery_id', 'news_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_news');
    }
};