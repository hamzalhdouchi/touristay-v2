<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\properties;
use App\Models\Reservation;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'adresse',
        'image',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function properties()
    {
        return $this->hasMany(properties::class);
    }
    
    public function favoris()
    {
        return $this->belongsToMany(Properties::class, 'favori', 'user_id', 'propertie_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($roleName)
    {
        return $this->role->role_nom === $roleName;
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
