<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $validated = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'address' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:255'],
            'role' => ['string', 'max:5'],
        ])->validate();

        return User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'address' => $validated['address'],
            'birthdate' => $validated['birthdate'],
            'phone' => $validated['phone'],
            'role' => $validated['role'] ?? 'user',
            'created_by' => $validated['name'],
            'updated_by' => '-',
        ]);
    }
}
