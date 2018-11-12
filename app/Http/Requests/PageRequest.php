<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'phone' => 'required|digits_between:5,12'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Заполните поле Имя',
            'phone.required' => 'Заполните поле Телефон',
            'name.min:3' => 'Поле имя должно содержать не менее 3-х и не более 100 символов',
            'name.max:100' => 'Поле имя должно содержать не менее 3-х и не более 100 символов',
            'phone.digits_between:5,12' => 'Поле Телефон должно содержать только цифры, не менее 5 и не более 12 символов',
        ];
    }
}
