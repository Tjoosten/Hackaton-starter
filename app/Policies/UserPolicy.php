<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy
 * 
 * @package App\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user  The resource entity from the authenticated user.
     * @param  User  $model The resource entity from the given user
     * @return bool
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasRole('admin') || $user->is($model);
    }

    /**
     * Determine whether the authenticated user can view other user profiles or not. 
     * 
     * @param  User $user The resource entity from the authenticated user 
     * @return bool 
     */
    public function view(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'webmaster']);
    } 

    /**
     * Determine whether the user can impersonate other users or not. 
     * 
     * @param  User $user  The user entity from the authenticated user
     * @param  User $model The user entity from the authenticated user. 
     * @return bool 
     */
    public function impersonate(User $user, User $model): bool 
    {
        return ! $user->is($model) && $user->hasRole('webmaster');
    }
}
