<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandante extends Model
{
    use HasFactory;

    protected $table = 'demandante';

    public function prestaciones(){
        return $this->belongsToMany(Prestacion::class);
    }
}
