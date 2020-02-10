<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Email implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!empty($value)) {
            $pattern = "/^[a-zA-Z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/";

            if (preg_match($pattern, $value, $matches)) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The email must be a valid email address.';
    }
}
