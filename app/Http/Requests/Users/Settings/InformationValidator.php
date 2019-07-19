<?php

namespace App\Http\Requests\Users\Settings;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InformationValidator 
 * 
 * @package App\Http\Requests\Users\Settings
 */
class InformationValidator extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255'], 
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user()->id],
        ];
    }
}
