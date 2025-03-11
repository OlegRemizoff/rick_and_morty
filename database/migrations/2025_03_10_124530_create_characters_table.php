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
        Schema::create('characters', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('name');
            $table->string('status');
            $table->string('species');
            $table->string('type')->default('');
            $table->string('gender');
            $table->string('image');
            $table->string('url');
            $table->string('created');
            $table->integer('location_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
