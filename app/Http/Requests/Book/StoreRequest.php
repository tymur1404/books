<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'isbn' => 'required|string|regex:/^\d{10,13}$/|unique:books,isbn',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id'
        ];
    }

}
