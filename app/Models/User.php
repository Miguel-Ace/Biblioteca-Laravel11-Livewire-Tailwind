<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'direccion',
        'tipo_usuario',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Un usuario puede hacer múltiples préstamos.
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'user_id', 'id');
    }

    // Un usuario puede hacer múltiples reservaciones.
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'user_id', 'id');
    }

    // Un usuario puede ser penalizado varias veces
    public function penalties(): HasMany
    {
        return $this->hasMany(Penalties::class, 'user_id', 'id');
    }
}
