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
        Schema::create('ks_permission_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->nullable();
            $table->string('css_class')->nullable();
            $table->unsignedInteger('display_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ks_permission_categories');
    }
};
