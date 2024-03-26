<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria_Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_categoria',
        'id_libro'
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
