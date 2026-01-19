<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalContent extends Model
{
    use HasFactory;

    protected $primaryKey = 'content_id';

    protected $fillable = ['title', 'body', 'content_type', 'publish_date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
