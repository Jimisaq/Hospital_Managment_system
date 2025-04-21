<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Drug extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'drugs';

    // Define the fillable attributes
    protected $fillable = [
        'drug_name',
        'category',
        'unit_price',
        'quantity_in_stock',
        'expiry_date',
        'added_by',
    ];

    // Define the relationship with the User model (for the user who added the drug)
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
