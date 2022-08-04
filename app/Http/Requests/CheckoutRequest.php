<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'id' => 'integer',
            'matakuliah_id' => 'required|integer',
            'labs_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'nim' => 'required|integer',
            'kelas' => 'required|string|max:255',
            'phone' => 'required',
            'pertemuan_ke' => 'required|integer',
            'keperluan' => 'required|string|max:255|in:PENELITIAN,PRAKTIKUM,PKM',
            // 'matakuliah' => 'required|string|max:255',
        ];
    }
}
