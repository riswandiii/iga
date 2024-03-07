<?php

namespace App\Policies;

use App\Models\Inisiator_Inovasi_Daerah;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InisiatorInovasiDaerahPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inisiator_Inovasi_Daerah $inisiatorInovasiDaerah): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inisiator_Inovasi_Daerah $inisiatorInovasiDaerah): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inisiator_Inovasi_Daerah $inisiatorInovasiDaerah): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inisiator_Inovasi_Daerah $inisiatorInovasiDaerah): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inisiator_Inovasi_Daerah $inisiatorInovasiDaerah): bool
    {
        //
    }
}
