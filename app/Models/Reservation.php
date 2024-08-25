<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'fecha_reserva',
        'estado',
    ];

    // Se hace una reservaciòn por usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Solo puedes reservar un libro
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
