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
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('path', 240);
            $table->string('name', 140)->nullable();
            $table->string('file_name', 140)->nullable();
            $table->string('description', 240)->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->string('extension', 6)->nullable();
            $table->integer('size')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('file_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
