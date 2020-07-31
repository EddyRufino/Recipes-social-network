<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'slug' => 'min:5|max:100',
            'ingredient' => 'required|min:5',
            'preparation' => 'required|min:5',
            'image' => '',
            // required|image
            'user_id' => '',
            'category_id' => 'required',
        ];
    }
}
