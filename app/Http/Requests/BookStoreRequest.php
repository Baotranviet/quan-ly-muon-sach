<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'book_code' => 'required|string|unique:books',
            'book_name' => 'required|string',
            'page_number' => 'required|numeric',
            'quantity' => 'required|numeric',
            'author' => 'required|string',
        ];
    }
}
