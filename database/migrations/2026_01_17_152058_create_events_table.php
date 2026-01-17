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
       Schema::create('events', function (Blueprint $table) {
    $table->id('event_id');
    $table->string('title');
    $table->text('description')->nullable();
    $table->date('event_date');
    $table->time('start_time');
    $table->time('end_time');
    $table->unsignedBigInteger('hall_id');
    $table->unsignedBigInteger('created_by'); // Admin
    $table->timestamps();

    $table->foreign('hall_id')->references('hall_id')->on('halls')->onDelete('cascade');
    $table->foreign('created_by')->references('user_id')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
