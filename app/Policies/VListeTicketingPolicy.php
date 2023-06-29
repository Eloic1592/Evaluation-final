<?php

namespace App\Policies;

use App\Models\User;
use App\Models\v_liste_ticketing;
use Illuminate\Auth\Access\HandlesAuthorization;

class VListeTicketingPolicy
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
     * @param  \App\Models\v_liste_ticketing  $vListeTicketing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, v_liste_ticketing $vListeTicketing)
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
     * @param  \App\Models\v_liste_ticketing  $vListeTicketing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, v_liste_ticketing $vListeTicketing)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\v_liste_ticketing  $vListeTicketing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, v_liste_ticketing $vListeTicketing)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\v_liste_ticketing  $vListeTicketing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, v_liste_ticketing $vListeTicketing)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\v_liste_ticketing  $vListeTicketing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, v_liste_ticketing $vListeTicketing)
    {
        //
    }
}
