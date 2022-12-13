<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatkulRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks_matkul' => 'required|integer',
            'ket_matkul' => 'required|string',
        ];
    }
}
