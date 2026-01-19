<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hall_id',
        'booking_date',
        'start_time',
        'end_time',
        'attendees',
        'event_type',
        'status',
        'total_price',
    ];
}
