<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invoice extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'invoices';

    // Define the fillable attributes
    protected $fillable = [
        'patient_id',
        'total_amount',
        'amount_paid',
        'payment_method',
        'payment_status',
        'issued_by',
        'issued_date',
    ];

    // Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Define the relationship with the User model (for the user who issued the invoice)
    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}
