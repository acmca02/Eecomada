<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // autorise l'insertion de ces colonnes via ::create() ou fill()
    protected $fillable = [
        'anarana',
        'toerana',
        'numero',
        'fangatahana',
    ];
}
