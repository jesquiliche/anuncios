<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    use HasFactory;

    protected $table = 'poblaciones';

    protected $primaryKey = 'codigo';

    public $incrementing = false;

    protected $fillable = [
        'codigo',
        'nombre',
        'provincia_cod',
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class, 'cod_postal', 'codigo');
    }
}
