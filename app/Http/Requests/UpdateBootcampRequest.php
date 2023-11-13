<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBootcampRequest extends FormRequest
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
            'thumbnail' => 'image|mines:jpeg,png,jpg,giv,svg',
            'nama'=> 'required',
            'kategori_id'=> 'required',
            'mentor_id'=> 'required',
            'harga'=> 'required',
            'kuota'=> 'required',
            'deskripsi'=> 'required',
        ];
    }
    public function messages(): array
    {
        return[
            'thumbnail.image'=> 'Thumbnail harus berupa gambar!',
            'nama.required'=> 'Silahkan Masukan Nama Bootcamp !',
            'kategori_id'=> 'Silahkan Pilih Kategori Bootcamp !',
            'mentor_id'=> 'Silahkan Pilih Nama Mentor Bootcamp !',
            'harga.required'=> 'Silahkan Masukan Harga Bootcamp !',
            'kuota.required'=> 'Silahkan Masukan Kuota Bootcamp !',
            'deskripsi.required'=> 'Silahkan Masukan Deskripsi Bootcamp !',
        ];
    }
}

