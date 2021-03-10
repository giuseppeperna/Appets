<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RistoranteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->rist_id,
            'nome' => $this->rist_nome,
            'tipologia' => $this->tipologie->pluck('tipologia_nome'),
            'descrizione' => $this->rist_descrizione,
            'indirizzo' => $this->rist_indirizzo,
            'partita_iva' => $this->rist_p_iva
        ];
    }
}
