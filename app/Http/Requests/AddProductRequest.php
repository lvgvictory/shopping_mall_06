<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'description' => 'required',
            'total' => 'required',
            'photos.*' => 'required|mimes:jpeg,jpg,png|max:2000',
        ];
        $photos = count($this->input('photos.'));
        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'required|image|mimes:jpeg,bmp,png|max:2000';
        }

        return $rules;
    }
}
