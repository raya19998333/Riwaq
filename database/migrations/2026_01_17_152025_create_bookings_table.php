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
       Schema::create('bookings', function (Blueprint $table) {
    $table->id('booking_id');
    $table->date('booking_date');
    $table->time('start_time');
    $table->time('end_time');
    $table->integer('attendees');
    $table->string('event_type');
    $table->string('status');
    $table->decimal('total_price', 10, 2)->nullable();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('hall_id');
    $table->timestamps();

    $table->foreignId('user_id')
          ->nullable()
          ->constrained('users') // ← تلقائيًا يربط مع users.id
          ->onDelete('cascade');

    $table->foreignId('hall_id')
          ->constrained('halls')
          ->onDelete('cascade');

    $table->date('booking_date');
    $table->string('status')->default('pending');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
