<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'año_publicacion',
        'copias_disponibles',
    ];

    // Un libro puede tener varios autores
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    // Un libro puede tener varias editoriales
    public function publishers(): BelongsToMany
    {
        return $this->belongsToMany(Publisher::class, 'book_publisher');
    }

    // Un libro puede tener varias categorias
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'book_categorie');
    }

    // Un libro solo puede ser prestado una ves
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'book_id', 'id');
    }

    // Un libro solo puede ser reservado una ves
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'book_id', 'id');
    }
}
