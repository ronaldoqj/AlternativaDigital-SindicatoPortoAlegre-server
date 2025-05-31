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
        Schema::create('generic_pages', function (Blueprint $table) {
            $table->id();
            $table->string('group_page', 50)->nullable();
            $table->string('link', 240)->nullable();
            $table->string('page', 140)->comment('[ Name of page ]');
            $table->string('title', 240)->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generic_pages');
    }
};
