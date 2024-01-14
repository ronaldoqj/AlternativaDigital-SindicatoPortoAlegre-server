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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->string('video', 240)->nullable();
            $table->char('draft', 1)->default('n')->comment('[ n | y ]');
            $table->char('pin_to_home', 1)->default('n')->comment('[ n | y ]');
            $table->string('title', 240)->nullable();
            $table->string('call', 240)->nullable();
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
