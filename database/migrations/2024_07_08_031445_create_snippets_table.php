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
        Schema::create('snippets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('snippets');

            $table->string('title');
            $table->text('code');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snippets');
    }
};
