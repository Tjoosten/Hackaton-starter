<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreValidator 
 * 
 * @package App\Http\Requests\Users
 */
class StoreValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool 
    {
        // No authorization check needed because this happends on
        // The controller action class. 

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'max:255'], 
            'lastname'  => ['required', 'string', 'max:255'], 
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'], 
            'roles'     => ['required', 'array', 'min:1'],
        ];
    }
}
