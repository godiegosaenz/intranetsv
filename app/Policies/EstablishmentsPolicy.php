<?php

namespace App\Policies;

use App\Models\Establishments;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstablishmentsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function before(User $user, $ability)
    {

    }

    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Establishments  $establishments
     * @return mixed
     */
    public function view(User $user, Establishments $establishments)
    {
        return $user->hasPermissionTo('ver establecimiento');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('crear establecimiento');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Establishments  $establishments
     * @return mixed
     */
    public function update(User $user, Establishments $establishments)
    {
        //
    }

    public function edit(User $user, Establishments $establishments)
    {
        return $user->hasPermissionTo('editar establecimiento');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Establishments  $establishments
     * @return mixed
     */
    public function delete(User $user, Establishments $establishments)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Establishments  $establishments
     * @return mixed
     */
    public function restore(User $user, Establishments $establishments)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Establishments  $establishments
     * @return mixed
     */
    public function forceDelete(User $user, Establishments $establishments)
    {
        //
    }
}
