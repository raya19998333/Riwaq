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
    $table->id(); // المفتاح الأساسي

    $table->string('title');
    $table->text('description')->nullable();
    $table->date('start_date');
    $table->date('end_date');

    // الربط مع sections
    $table->foreignId('section_id')
          ->constrained()   // يشير تلقائيًا إلى sections.id
          ->onDelete('cascade');

    $table->timestamps();
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
