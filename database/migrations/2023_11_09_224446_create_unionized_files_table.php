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
        Schema::create('unionized_files', function (Blueprint $table) {
            $table->id();

            $table->string('path', 240);
            $table->string('name', 140)->nullable();
            $table->string('file_name', 140)->nullable();
            $table->string('description', 240)->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->string('extension', 6)->nullable();
            $table->integer('size')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unionized_files');
    }
};
