<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactValidator 
 * 
 * @package App\Http\Requests
 */
class ContactValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
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
            'name'      => ['required', 'string'],
            'message'   => ['required', 'string'],
            'subject'   => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email'],
        ];
    }
}
