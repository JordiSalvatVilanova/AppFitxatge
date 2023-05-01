<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitxatge extends Model
{
    use HasFactory;

    protected $table = "fitxatge";

    protected $fillable = [
        "id_empresa", "id_traballador", "entrada", "pausa", "continuitat", "sortida", "data"
    ];
}
