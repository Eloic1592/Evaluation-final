<?php

namespace App\Policies;

use App\Models\User;
use App\Models\type_lieu;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeLieuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\type_lieu  $typeLieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, type_lieu $typeLieu)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\type_lieu  $typeLieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, type_lieu $typeLieu)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\type_lieu  $typeLieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, type_lieu $typeLieu)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\type_lieu  $typeLieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, type_lieu $typeLieu)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\type_lieu  $typeLieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, type_lieu $typeLieu)
    {
        //
    }
}
