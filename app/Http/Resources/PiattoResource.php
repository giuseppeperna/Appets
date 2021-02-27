<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PiattoResource extends JsonResource
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
            'id' => $this->piatto_id,
            'nome' => $this->piatto_nome,
            'img_path' => $this->piatto_img,
            'descrizione' => $this->piatto_descrizione,
            'prezzo' => $this->piatto_prezzo,
            'visibile' => $this->piatto_visibile,
            'ristorante' => $this->rist_id
        ];
    }
}
