<?php

namespace App\Http\Requests\Users\Settings;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordCheck;

/**
 * Class PasswordValidator 
 * 
 * @package App\Http\Requests\Users\Settings
 */
class PasswordValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool 
    {
        // No authorization check required because authorization happend on 
        // The controller action function. 

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
            'current_password' => ['required', new PasswordCheck()],
            'password'         => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
}
