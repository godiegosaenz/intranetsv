<?php

namespace App\Policies;

use App\Models\PersonEntity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonEntityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonEntity  $personEntity
     * @return mixed
     */
    public function view(User $user, PersonEntity $personEntity)
    {
        return $user->hasPermissionTo('ver personas');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('crear personas');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonEntity  $personEntity
     * @return mixed
     */
    public function update(User $user, PersonEntity $personEntity)
    {
        //
    }

    public function edit(User $user, PersonEntity $personEntity)
    {
        return $user->hasPermissionTo('editar personas');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonEntity  $personEntity
     * @return mixed
     */
    public function delete(User $user, PersonEntity $personEntity)
    {
        return $user->hasPermissionTo('eliminar personas');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonEntity  $personEntity
     * @return mixed
     */
    public function restore(User $user, PersonEntity $personEntity)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonEntity  $personEntity
     * @return mixed
     */
    public function forceDelete(User $user, PersonEntity $personEntity)
    {
        //
    }
}
