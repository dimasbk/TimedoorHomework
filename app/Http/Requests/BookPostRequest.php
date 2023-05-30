<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'image_path' => 'required|string',
            'publisher' => 'required|string',
            'category' => 'required|string',
            'pages' => 'required|numeric',
            'language' => 'required|string',
            'publish_date' => 'required',
            'subjects' => 'required|string',
            'desc' => 'required|string',
            'isbn' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Title must be a string',
            'author.string' => 'Author must be a string',
            'image_path.string' => 'Image Path must be a string',
            'publisher.string' => 'Publisher must be a string',
            'category.string' => 'Category must be a string',
            'pages.numeric' => 'Pages must be a numeric',
            'language.string' => 'Language must be a string',
            'desc.string' => 'Description must be a string',
            'subjects.string' => 'Subjects must be a string',
            'isbn.numeric' => 'ISBN must be a numeric',
        ];
    }
}