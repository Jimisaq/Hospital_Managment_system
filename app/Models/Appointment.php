<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'appointments';

    // Define the fillable attributes
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'time',
        'note',
    ];

    // Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Define the relationship with the User model (for doctors)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
