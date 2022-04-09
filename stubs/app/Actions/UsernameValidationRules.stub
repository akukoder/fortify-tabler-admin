<?php

namespace App\Actions;

use App\Models\User;
use App\Rules\Username;
use Illuminate\Validation\Rule;

trait UsernameValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function usernameRules($ignore = false)
    {
        if ($ignore !== false) {
            return [
                'required',
                'string',
                new Username,
                Rule::unique(User::class)->ignore($ignore)
            ];
        }

        return [
            'required',
            'string',
            new Username,
            Rule::unique(User::class)
        ];
    }
}
