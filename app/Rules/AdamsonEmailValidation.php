<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AdamsonEmailValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
    }

    public function passes($attribute, $value)
    {
    $domainPart = explode('@', $value)[1] ?? null;

    if (!$domainPart) {
        return false;
    }

    if ($domainPart != 'adamson.edu.ph') {
        return false;
    }
    
    }
    public function message()
{
    return 'The :attribute must be a adamson.edu.ph address';
}


}