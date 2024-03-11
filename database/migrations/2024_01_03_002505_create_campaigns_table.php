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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->unsignedBigInteger('banner_desktop_id')->nullable();
            $table->unsignedBigInteger('banner_mobile_id')->nullable();
            $table->unsignedBigInteger('card_image_id')->nullable();
            $table->char('draft', 1)->default('n')->comment('[ n | y ]');
            $table->char('pin_to_home', 1)->default('n')->comment('[ n | y ]');
            $table->char('show_to_home_banner', 1)->default('n')->comment('[ n | y ]');
            $table->string('link', 512)->nullable();
            $table->string('target', 6)->default('_self')->comment('[ _self | _blank ]');
            $table->timestamps();

            $table->foreign('banner_desktop_id')->references('id')->on('files');
            $table->foreign('banner_mobile_id')->references('id')->on('files');

            $table->foreign('card_image_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
