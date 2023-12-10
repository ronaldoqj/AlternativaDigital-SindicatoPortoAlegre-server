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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('card_image_id')->nullable();
            $table->string('topper', 240)->nullable();
            $table->string('title', 240)->nullable();
            $table->string('call', 240)->nullable();
            $table->text('text')->nullable();

            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('files');
            $table->foreign('card_image_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
