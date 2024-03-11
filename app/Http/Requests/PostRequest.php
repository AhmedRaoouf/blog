<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'title' => ['required', 'regex:/^[A-Za-z\s]+$/',Rule::unique('posts')->ignore($this->post? $this->post->id : 0, 'id')], // title unique and only letters
            'image' => ['image','mimes:png,jpg,webp','max:2048'], //image with image type [ png, jpg, webp ]and max size for upload 2M
            'content' => ['required', 'min:20' ], //content Minimum number of letters 20
            'author' => [ 'required', 'string'],
        ];
    }
}
