<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordine extends Model
{
    protected $table = 'ordini';

    protected $primaryKey = 'ord_id';

    protected $fillable = [
        'ord_nome', 'ord_cognome', 'ord_indirizzo', 'ord_totale', 'ord_commenti', 'ord_stato'
    ];

    public function piatti() {
        return $this->belongsToMany("App\Piatto", "piatti_ordini", "ord_id", "piatto_id");
    }
}
