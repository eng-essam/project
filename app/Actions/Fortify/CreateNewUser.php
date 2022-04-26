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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:8'],
            'ssn' => ['required','numeric','digits:14'],
            'union_number' => ['required','numeric'],
        ])->validate();

        $user = User::where('ssn', '=',$input['ssn'])
            ->where('union_number', '=',$input['union_number'] )
            ->where('role_id', '=', '3')
            ->first();

        $user->update([
            'email' =>$input['email'] ,
            'password' =>Hash::make($input['password']) ,
        ]);

        return $user;
    }
}
