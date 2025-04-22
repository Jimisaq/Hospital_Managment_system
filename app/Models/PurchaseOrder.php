<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'drug_id',
        'quantity_ordered',
        'status',
    ];

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
