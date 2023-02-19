<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    use HasFactory;

    protected $table = 'prestacions';

    protected $fillable = [
        'id',
        'nombre',
        'cuantia',
    ];

    public function demandantes(){
        return $this->belongsToMany(Demandante::class, 'prestamos');
    }
}
