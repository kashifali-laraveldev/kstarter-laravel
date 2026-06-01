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
        Schema::create('ks_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable()->unique();
            $table->unsignedTinyInteger('is_active')->default(1);
            $table->string('remember_token')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ks_users');
    }
};
