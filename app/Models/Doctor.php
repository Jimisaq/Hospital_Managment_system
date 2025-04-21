<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Specify the table name (optional if it follows Laravel's convention)
    protected $table = 'doctors';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'specialization',
        'licence_number',
        'room_number',
        'department',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
