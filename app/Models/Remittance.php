<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Remittance extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_name', 'apartment','status', 'amount_paid',
        'payment_date', 'debt_amount', 'debt_due_date', 'rent_due_date', 'payment_method',
        'notes', 'payment_proof'
    ];

}
