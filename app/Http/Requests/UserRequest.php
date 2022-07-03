<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return arrayp
     */
    public function rules()
    {
      return [
            "roles_id" => "required",
            "name" => "string|max:255|required",
            "email" => "string|max:255|required|email",
        ];
    }
}
