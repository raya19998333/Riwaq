<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $primaryKey = 'section_id';

    protected $fillable = ['name', 'description', 'floor_number'];

    public function halls()
    {
        return $this->hasMany(Hall::class, 'section_id', 'section_id');
    }

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class, 'section_id', 'section_id');
    }
}
