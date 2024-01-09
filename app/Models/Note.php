<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'notes',
    ];

    // Define relationships if needed
    // For example, if each note belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
