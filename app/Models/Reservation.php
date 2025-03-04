<?php

namespace App\Models;

use App\Models\properties;
use App\Models\User;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'properties_id',
        'dataArrivée',
        'dateDépart',
        'prix_Total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function properties()
    {
        return $this->belongsTo(properties::class);
    }
}
