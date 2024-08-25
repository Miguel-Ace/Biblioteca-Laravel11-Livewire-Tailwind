<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'contacto',
    ];

    // Una editorial puede tener varios libros
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_publisher');
    }
}
