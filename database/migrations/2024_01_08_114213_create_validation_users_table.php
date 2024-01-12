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
        Schema::create('validation_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_voter')->unique()->constrained('users')->onDelete('cascade');
            $table->string('nik')->nullable();
            $table->string('nim')->nullable();
            $table->string('validation_image');
            $table->enum('status', ['verified', 'not_verified'])->default('not_verified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validation_users');
    }
};
