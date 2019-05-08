<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/**
 * Class passwordCheck 
 * 
 * @package App\Rules
 */
class PasswordCheck implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute       The attribute name from the input. 
     * @param  mixed  $value           The value of the attribute field. 
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->getAuthPassword());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your current password is incorrect.';
    }
}
