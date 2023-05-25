<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo';

    public $incrementing = false;

    protected $fillable = ['codigo', 'nombre'];

    public function poblaciones()
    {
        return $this->hasMany(Poblacion::class, 'provincia_cod','codigo' );
    }
}
