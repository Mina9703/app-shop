<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable; // Importa el trait Searchable

class Trainer extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['name', 'apellido', 'avatar'];

    // Personaliza qué datos se indexan en Algolia
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'apellido' => $this->apellido,
            // Puedes agregar más campos si lo necesitas
        ];
    }
}

