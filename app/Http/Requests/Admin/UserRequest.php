<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        // $user = User::all(); 

        return [
            // 'full_name' => 'required|string',
            // 'alamat' => 'required',

            // 'email' => ['required','string','unique:users,email,'],
            // 'phone_number' => ['required','string','unique:users,phone_number,'],

            'roles' => 'string|in:ADMIN,USER',
        ];
    }
}
