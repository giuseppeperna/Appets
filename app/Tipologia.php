<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    protected $table = 'tipologie';

    protected $primaryKey = 'tipologia_id';

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function ristoranti() {
        return $this->belongsToMany("App\User", "tipologie_ristoranti", "tipologia_id", "rist_id");
    }
}
