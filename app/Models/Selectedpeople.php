<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selectedpeople extends Model
{
    use HasFactory;

    protected $table = 'selectedpeople'; // Add this line
    protected $fillable = ['user_id', 'firstname', 'lastname'];

    public $timestamps = false;

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}















