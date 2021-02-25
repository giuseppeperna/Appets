<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ristorante extends Model
{
    protected $table = 'ristoranti';

    protected $fillable = [
        'rist_email', 'rist_password', 'rist_nome', 'rist_descrizione', 'rist_indirizzo', 'rist_p_iva'
    ];

    public function tipologie() {
        return $this->belongsToMany("App\Tipologia", "tipologie_ristoranti", "rist_id", "tipologia_id");
    }

    public function piatti() {
        return $this->hasMany("App\Piatto", "rist_id", "piatto_id");
    }
}
