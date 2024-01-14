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
        Schema::create('page_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id')->unsigned();
            $table->unsignedBigInteger('page_id')->unsigned();
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_videos');
    }
};
