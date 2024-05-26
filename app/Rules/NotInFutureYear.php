<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class NotInFutureYear implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the provided year is not in the future
        return !Carbon::create($value, 1, 1)->isFuture();
    }

    public function message()
    {
        return 'The :attribute must not be in the future.';
    }
}
