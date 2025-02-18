<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'    => 'required|string',
            'content'  => 'nullable|string',
            'image'    => 'nullable|image|max:2048', // Optional image field.
            'is_premium'=> 'nullable|boolean',
            //'user_id'  => 'required|integer', // Currently provided via the form.
        ];
    }
}
