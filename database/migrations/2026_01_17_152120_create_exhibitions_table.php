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
     Schema::create('exhibitions', function (Blueprint $table) {
    $table->id('exhibition_id');
    $table->string('title');
    $table->text('description')->nullable();
    $table->date('start_date');
    $table->date('end_date');
    $table->unsignedBigInteger('section_id');
    $table->timestamps();

    $table->foreign('section_id')->references('section_id')->on('sections')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitions');
    }
};
