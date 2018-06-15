<?php

namespace App\Http\Requests\Cabinet;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'string|required|max:255|unique:posts,title',
            'category_id' => 'integer|required|exists:post_categories,id',
            'img' => 'required|max:4000|image',
            'description' => 'string|required'
        ];
    }
}
