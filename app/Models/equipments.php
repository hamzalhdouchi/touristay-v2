<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\properties;

class equipments extends Model
{
    use HasFactory;

    public function properties()
    {
        return $this->belongsToMany(properties::class, 'equipement_propertie', 'equipment_id', 'propertie_id');
    }
}
