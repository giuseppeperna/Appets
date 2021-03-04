<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PiattoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'piatto_nome' => 'bail|required|min:3',
            'piatto_img' => 'mimes:jpeg,jpg,png|max:5120',
            'tipologia' => 'required|not_in:...',
            'piatto_descrizione' => 'required|between:5,180',
            'piatto_prezzo' => 'required',
            'piatto_visibile' => 'required'
        ];
    }
}
