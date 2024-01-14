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
            $table->char('draft', 1)->default('n')->comment('[ n | y ]');
            $table->unsignedBigInteger('banner_desktop_id')->nullable();
            $table->unsignedBigInteger('banner_mobile_id')->nullable();
            $table->unsignedBigInteger('image_news_id')->nullable();
            $table->string('position_image_news', 40)->nullable()->comment('[ beforeTitle | beforeText | AfterText ]');
            $table->string('video_news', 240)->nullable();
            $table->string('position_video_news', 40)->nullable()->comment('[ beforeTitle | beforeText | AfterText ]');
            $table->unsignedBigInteger('audio_news_id')->nullable();
            $table->string('position_audio_news', 40)->nullable()->comment('[ beforeTitle | beforeText | AfterText ]');
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

            $table->foreign('banner_desktop_id')->references('id')->on('files');
            $table->foreign('banner_mobile_id')->references('id')->on('files');
            $table->foreign('image_news_id')->references('id')->on('files');
            $table->foreign('audio_news_id')->references('id')->on('files');
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
