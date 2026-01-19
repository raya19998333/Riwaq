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
       Schema::create('cultural_contents', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->text('body');
    $table->string('content_type');
    $table->date('publish_date')->nullable();

    $table->foreignId('user_id')
          ->nullable()
          ->constrained()    // يشير تلقائيًا إلى users.id
          ->nullOnDelete();  // إذا حُذف المستخدم تصبح القيمة null

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultural_contents');
    }
};
