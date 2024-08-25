<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penalties extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_id',
        'monto',
        'motivo',
        'fecha',
    ];

    // La sanciòn aplica por usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // La sanciòn aplica por prestamo
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }
}
