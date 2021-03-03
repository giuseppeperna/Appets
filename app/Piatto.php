<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piatto extends Model
{
    protected $table = 'piatti';

    protected $primaryKey = 'piatto_id';

    protected $fillable = [
        'rist_id', 'piatto_nome', 'piatto_img', 'piatto_descrizione', 'piatto_prezzo', 'piatto_visibile'
    ];

    public function ristoranti() {
        return $this->belongsTo("App\User", "rist_id", "piatto_id");
    }

    public function ordini() {
        return $this->belongsToMany("App\Ordine", "piatti_ordini", "piatto_id", "ord_id");
    }
}
