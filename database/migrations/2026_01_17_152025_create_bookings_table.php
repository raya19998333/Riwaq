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
    $table->id(); // primary key

    // الربط الصحيح مع جدول users
    $table->foreignId('user_id')
          ->nullable()
          ->constrained() // يفترض users.id تلقائيًا
          ->onDelete('cascade');

    // الربط الصحيح مع جدول halls
    $table->foreignId('hall_id')
          ->constrained()  // يفترض halls.id تلقائيًا
          ->onDelete('cascade');

    // باقي الحقول
    $table->date('booking_date')->nullable();
    $table->time('start_time')->nullable();
    $table->time('end_time')->nullable();
    $table->integer('attendees')->nullable();
    $table->string('event_type')->nullable();
    $table->string('status')->default('pending');
    $table->decimal('total_price', 10, 2)->nullable();

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
