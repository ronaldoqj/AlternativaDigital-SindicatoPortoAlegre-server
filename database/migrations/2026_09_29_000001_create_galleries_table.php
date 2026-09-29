<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('file_categories')->updateOrInsert(
            ['id' => 15],
            [
                'name' => 'Galerias',
                'description' => 'Imagens das galerias',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title', 180);
            $table->string('subtitle', 240)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained('galleries')->cascadeOnDelete();
            $table->foreignId('file_id')->constrained('files');
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();

            $table->unique(['gallery_id', 'file_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('galleries');

        if (!DB::table('files')->where('category_id', 15)->exists()) {
            DB::table('file_categories')->where('id', 15)->delete();
        }
    }
};
