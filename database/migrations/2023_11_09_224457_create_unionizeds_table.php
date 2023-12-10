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
        Schema::create('unionizeds', function (Blueprint $table) {
            $table->id();

            $table->string('status', 20)->default('started')->comment('[ started (initial fill) | completed (attached file) | confirmed (finished)]');
            $table->unsignedBigInteger('unionized_file_id')->nullable();
            $table->string('bank', 40)->nullable();
            $table->string('code_bank', 40)->nullable();
            $table->string('agency', 40)->nullable();
            $table->string('commercial_phone', 30)->nullable();
            $table->string('extension', 30)->nullable();
            $table->char('already_associated', 1)->default('n')->comment('[ n | y ]');
            $table->string('registration', 60)->nullable();
            $table->string('position', 60)->nullable();
            $table->string('commercial_email', 140)->nullable();

            $table->string('name', 140)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('issuing_authority', 20)->nullable();
            $table->date('birth')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('color', 20)->nullable();
            $table->string('marital_status', 40)->nullable();
            $table->string('email', 140)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('cellphone', 30)->nullable();
            $table->string('home_address', 140)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('complement', 40)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->char('state', 2)->nullable();

            $table->char('auth_agree', 1)->default('n')->comment('[ n | y ]');
            $table->string('auth_bank', 40)->nullable();
            $table->string('auth_code_bank', 40)->nullable();
            $table->string('auth_agency', 40)->nullable();

            $table->timestamps();

            $table->foreign('unionized_file_id')->references('id')->on('unionized_files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unionizeds');
    }
};
