<?php

namespace App\Policies;

use App\Models\SmtpServer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SmtpServerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('smtp-server.list');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SmtpServer $smtpServer): bool
    {
        return $user->can('smtp-server.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('smtp-server.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SmtpServer $smtpServer): bool
    {
        return $user->can('smtp-server.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SmtpServer $smtpServer): bool
    {
        return $user->can('smtp-server.delete');
    }
}
