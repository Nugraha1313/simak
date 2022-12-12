<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalRequest extends FormRequest
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
            'fk_matkul_jadwal' => 'required|integer',
            'hari_jadwal' => 'required',
            'waktu_jadwal' => 'required',
            'fk_dosen_jadwal' => 'required|integer',
            'fk_ruangan_jadwal'  => 'required|integer',
            // 'fk_ta_jadwal'  => 'integer',
            // 'fk_krs_jadwal'  => 'required|integer',
        ];
    }
}