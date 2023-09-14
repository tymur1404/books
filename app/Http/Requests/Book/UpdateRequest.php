<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'isbn' => [
                'required',
                'string',
                'regex:/^\d{10,13}$/',
                Rule::unique('books', 'isbn')->ignore($this->route('book')), // Исключение текущей книги
            ],
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id'
        ];
    }

}
