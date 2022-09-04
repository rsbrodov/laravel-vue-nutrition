<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required|max:150',
            'days1' => 'nullable',
            'days2' => 'nullable',
            'days3' => 'nullable',
            'days4' => 'nullable',
            'days5' => 'nullable',
            'days6' => 'nullable',
            'days7' => 'nullable',
            'nutrition1' => 'nullable',
            'nutrition2' => 'nullable',
            'nutrition3' => 'nullable',
            'nutrition4' => 'nullable',
            'nutrition5' => 'nullable',
            'nutrition6' => 'nullable',
        ];
    }

    public function messages() // меняет вообще весь текст ошибки
    {
        return [
            'name.required' => 'Поле "Название" является обязательным',
        ];
    }
}
