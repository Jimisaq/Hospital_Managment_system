<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
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
