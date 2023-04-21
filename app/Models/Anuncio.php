<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;
    protected $table="anuncios";
    

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'precio',
        'subcategoria_id',
        'provincia',
        'codprovincia'
    ];

    public function subcategoria(){
        return $this->belongsTo('App\Models\Subcategoria');
    }
   
    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function fotos(){
        return $this->hasMany('App\Models\Foto');
    }
 
}
