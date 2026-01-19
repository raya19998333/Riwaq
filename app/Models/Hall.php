<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $primaryKey = 'hall_id';

    protected $fillable = ['name', 'capacity', 'hall_type', 'equipment', 'price', 'image', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'section_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'hall_id', 'hall_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'hall_id', 'hall_id');
    }
}
