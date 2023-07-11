<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WordsCount implements ValidationRule
{
    protected $count;

    function __construct($count = 20)
    {
        $this->count = $count;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // return ;
        if(str_word_count($value) >= $this->count) {
            $fail("The :attribute must be less than or equal {$this->count} words.");
        }
    }
}
