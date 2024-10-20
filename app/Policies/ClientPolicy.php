<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $authUser): bool
    {
        return $authUser->can('client.list');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $authUser, User $targetUser): bool
    {
        return $authUser->can('client.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $authUser): bool
    {
        return $authUser->can('client.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authUser, User $targetUser): bool
    {
        return $authUser->can('client.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $authUser, User $targetUser): bool
    {
        return $authUser->can('client.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $authUser, User $targetUser): bool
    {
        return $authUser->can('client.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $authUser, User $targetUser): bool
    {
        return $authUser->can('client.force.delete');
    }
}
