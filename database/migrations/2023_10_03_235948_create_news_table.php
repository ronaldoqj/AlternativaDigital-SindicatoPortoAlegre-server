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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('type_news', 40)->nullable()->comment('[ image | video | audio | text ]');
            $table->string('position_news', 40)->nullable()->comment('[ banner | highlights | geral ]');
            $table->integer('id_banner_desktop')->nullable();
            $table->integer('id_banner_mobile')->nullable();
            $table->integer('id_image_news')->nullable();
            $table->string('position_image_news', 40)->nullable()->comment('[ beforeTitle | beforeText | AfterText ]');
            $table->string('video_news', 240)->nullable();
            $table->string('position_video_news', 40)->nullable()->comment('[ beforeTitle | beforeText | AfterText ]');
            $table->integer('id_audio_news')->nullable();
            $table->string('position_audio_news', 40)->nullable()->comment('[ beforeTitle | beforeText | AfterText ]');
            $table->integer('id_department')->nullable();
            $table->integer('id_bank')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('topper', 240)->nullable();
            $table->string('title', 240)->nullable();
            $table->string('call', 240)->nullable();
            $table->text('text')->nullable();
            $table->string('journalist_font', 240)->nullable();
            $table->string('url_email', 240)->nullable();
            $table->string('tags', 240)->nullable();
            $table->string('instagram', 240)->nullable();
            $table->string('facebook', 240)->nullable();
            $table->string('twitter', 240)->nullable();
            $table->string('whatsapp', 240)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
