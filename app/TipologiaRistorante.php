<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipologiaRistorante extends Model
{
    protected $table = 'tipologie_ristoranti';

    protected $fillable = [
        'tipologia_id', 'rist_id'
    ];
}
