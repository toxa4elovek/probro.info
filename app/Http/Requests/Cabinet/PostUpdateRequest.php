<?php

namespace App\Http\Requests\Cabinet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
            'title' => ['string', 'required', 'max:255', Rule::unique('posts')->ignore($this->post->title, 'title')],
            'category_id' => 'integer|required|exists:post_categories,id',
            'description' => 'string|required'
        ];

        if ($this['img'] instanceof UploadedFile) {
            $rules['img'] = 'required|max:4000|image';
            $rules['imageSource'] = 'string|nullable';
        } else {
            $rules['imageSource'] = 'string|required|exists:posts,img';
            $rules['img'] = 'nullable';
        }

        return $rules;

    }
}
