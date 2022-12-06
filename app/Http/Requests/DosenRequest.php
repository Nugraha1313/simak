<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DosenRequest extends FormRequest
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
            'nip_dosen' => 'required|integer',
            'nama_dosen' => 'required',
            'tmp_dosen' => 'required',
            'tgl_dosen' => 'required',
            'alamat_dosen' => 'required',
            'prodi_dosen' => 'required',
            'agama_dosen' => 'required',
            'telp_dosen' => 'required',
            'email_dosen' => 'required|email',
            'gender_dosen' => 'required',
            'foto_dosen' => 'nullable|image',
            'password' => 'required|confirmed',
        ];
    }
}
