<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'titol' => 'required|min:5',
            'contingut' => 'required|min:50'
        ];
    }

    public function messages()
    {
        return [
            'titol.required' => 'El titol és obligatori',
            'titol.min' => 'El titol cal tindre com a mínim 5 caràcters.',
            'contingut.required' => 'Cal afegir contingut',
            'contingut.min' => 'La longitud del contingut cal tindre com a mínim 50 caràcters'
        ];
    }
}
