<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'fecha_préstamo',
        'fecha_devolución',
        'estado',
    ];

    // Se hace prestamo por usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Se hace prestamo por libro
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    // Se penaliza por prestamo
    public function penaltie(): HasOne
    {
        return $this->hasOne(Penalties::class, 'book_id', 'id');
    }
}
