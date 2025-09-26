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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->nullable();
            $table->string('email')->unique();
            $table->string('phone')->index()->nullable();
            $table->enum('source', ['lead', 'account'])->default('lead');
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();

            $table->index(['source']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
