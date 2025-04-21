<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Carbon\Carbon;


class Appointment extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

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

     // Cast dates and times appropriately
     protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
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

     // Accessor to get formatted date
     public function getFormattedDateAttribute()
     {
         return $this->date ? $this->date->format('d M Y') : null;
     }
 
     // Accessor to get formatted time
     public function getFormattedTimeAttribute()
     {
         return $this->time ? Carbon::parse($this->time)->format('H:i') : null;
     }
 
     // Local scope to get upcoming appointments
     public function scopeUpcoming($query)
     {
         return $query->where('date', '>=', now()->toDateString());
     }
 
}
