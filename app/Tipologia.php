<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    protected $table = 'tipologie';

    public function ristoranti() {
        return $this->belongsToMany("App\Ristorante", "tipologie_ristoranti", "tipologia_id", "rist_id");
    }
}
