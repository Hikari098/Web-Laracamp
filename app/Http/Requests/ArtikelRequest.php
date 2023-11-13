<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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
            'title' => 'required',
            'tags' => 'required',
            'img_artikel' => 'required',
            'artikel' => 'required',

        ];
    }

    public function messages(): array
    {
        return[
            'title.required' => 'Silahkan  Masukan Judul untuk Artikel Anda !',
            'tags.required' => 'Silahkan  Masukan Tgs untuk Artikel Anda !' ,
            'img_artikel.required' => 'Silahkan Masukan Image Artikel untuk Artikel Anda !',
            'artikel.required' => 'Silahkan  Masukan Artikel untuk Artikel Anda !',
        ];
    }
}
