<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('role_user');
        //intentially skipped password validation below, so that the form can be updated without it
        return [
            'name' => ['required', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'max:255', 'email', 'unique:admins,email,'.$id]
        ];
    }
}
