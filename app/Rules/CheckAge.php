<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class CheckAge implements Rule
{
    protected $minAge;

    public function __construct($minAge)
    {
        $this->minAge = $minAge;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $birthdate = Carbon::parse($value);
        $now = Carbon::now();
        $age = $birthdate->diffInYears($now);

        return $age >= $this->minAge;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The :attribute must be at least {$this->minAge} years old.";
    }
}
