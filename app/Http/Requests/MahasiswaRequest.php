<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
            'nim_mahasiswa' => 'required|integer',
            'nama_mahasiswa' => 'required',
            'tmp_mahasiswa' => 'required',
            'tgl_mahasiswa' => 'required',
            'alamat_mahasiswa' => 'required',
            'prodi_mahasiswa' => 'required',
            'agama_mahasiswa' => 'required',
            'telp_mahasiswa' => 'required',
            'email_mahasiswa' => 'required|email',
            'gender_mahasiswa' => 'required',
            'foto_mahasiswa' => 'nullable|image',
            'password' => 'required|confirmed',
        ];
    }
}
