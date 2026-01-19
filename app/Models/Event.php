<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = ['title', 'description', 'event_date', 'start_time', 'end_time', 'hall_id', 'created_by'];

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'hall_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
}
