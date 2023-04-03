<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

   public function canDeleteRole(User $user, Role $role){

        return $user->can('roles.destroy','roles.update','roles.edit') && $role->id>5;
   }
}
