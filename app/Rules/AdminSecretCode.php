<?php

namespace App\Rules;

use App\Models\Key;
use Illuminate\Contracts\Validation\Rule;

class AdminSecretCode implements Rule
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
         //Get Keys and Compare to secret key
         $keys = Key::all();

         foreach($keys as $key){
           return $value === $key->key;
         }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Secret Code';
    }
}
