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
        Schema::create('stage_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('time');
            $table->foreignId('stage_id');
            $table->foreignId('driver_id');
            $table->foreignId('rally_id');
            $table->timestamps();

            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('rally_id')->references('id')->on('rallies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_results');
    }
};
