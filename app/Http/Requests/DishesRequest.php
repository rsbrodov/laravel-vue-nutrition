<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesRequest extends FormRequest
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
            'dishes_categories_id' => 'required',
            'recipes_collections_id' => 'required',
            'description' => 'required',
            'culinary_processings_id' => 'required',
            'yield' => 'required|numeric',
            'dishes_characters' => 'required',
            'techmap_number' => 'required|numeric',
        ];
    }

    public function messages() // меняет вообще весь текст ошибки
    {
        return [
            'name.required' => 'Поле "Название" является обязательным',
            'dishes_categories_id.required' => 'Поле "Категория блюда" является обязательным',
            'recipes_collections_id.required' => 'Поле "Сборник рецептур" является обязательным',
            'description.required' => 'Поле "description" является обязательным',
            'culinary_processings_id.required' => 'Поле "Способ приготовления" является обязательным',
            'yield.required' => 'Поле "Выход" является обязательным',
            'dishes_characters.required' => 'Поле "Характеристика" является обязательным',
            'techmap_number.required' => 'Поле "Номер техкарты" является обязательным',
        ];
    }
}
