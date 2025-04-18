<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'prescriptions';

    // Define the fillable attributes
    protected $fillable = [
        'record_id',
        'drug_id',
        'quantity',
        'dosage',
        'instruction',
    ];

    // Define the relationship with the MedicalRecord model
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class, 'record_id');
    }

    // Define the relationship with the Drug model
    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id');
    }
}
