<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class capitalcase implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $trimmedValue = trim($value);

        // Check if the first letter is capitalized
        $isFirstCapital = ucfirst($trimmedValue) === $trimmedValue;
    
        return $isFirstCapital;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The First letter should be capital.';
    }
}
