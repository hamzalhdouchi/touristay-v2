<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'payer_id',
        'payer_email',
        'status', 
        'amount',
    ];
}
