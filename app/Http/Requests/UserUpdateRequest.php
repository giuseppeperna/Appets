<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'rist_nome' => ['required', 'string', 'max:255'],
            'rist_descrizione' => ['required','between:10,380'],
            'email' => ['required', 'string', 'email',],
            'rist_indirizzo' => ['required', 'string'],
            'rist_p_iva' => ['required', 'digits:11'],
        ];
    }
}
