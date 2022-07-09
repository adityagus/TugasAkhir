<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kd_brg' => 'required|max:255',
            'category_id'=> 'required',
            'labs_id'=> 'required',
            'image' => 'required|image',
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'jumlah' => 'required|integer',
            'satuan' => 'required',

        ];
    }
}
