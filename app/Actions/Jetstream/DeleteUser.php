<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use App\Models\Coin;
use App\Models\Type;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        Coin::where('user_id', $user->id)->delete();
        Type::where('user_id', $user->id)->delete();
        $user->delete();
    }
}
