<?php

namespace App\Policies;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * StaffController and CustomerController both operate on the same
     * User model, so there's no $model instance yet to tell them apart
     * at the "view the whole list" stage - callers pass $context
     * explicitly:
     *   Gate::authorize('viewAny', [User::class, 'staff']);
     *   Gate::authorize('viewAny', [User::class, 'customers']);
     */
    public function viewAny(User $user, string $context = 'staff'): bool
    {
        return match ($context) {
            'customers' => $user->can(PermissionEnum::CUSTOMERS_VIEW->value),
            default => $user->can(PermissionEnum::STAFF_VIEW->value),
        };
    }

    /**
     * Determine whether the user can view the model.
     *
     * Unlike viewAny/create, $model is available here and tells us
     * directly whether this is a customer or a staff record - no
     * separate context argument needed.
     */
    public function view(User $user, User $model): bool
    {
        return $model->hasRole(RoleEnum::CUSTOMER->value)
            ? $user->can(PermissionEnum::CUSTOMERS_VIEW->value)
            : $user->can(PermissionEnum::STAFF_VIEW->value);
    }

    /**
     * Determine whether the user can create models.
     *
     * $context distinguishes staff creation from admin-assisted customer
     * creation (e.g. walk-in branch onboarding) - both check a distinct
     * permission since there's no target $model yet to inspect.
     */
    public function create(User $user, string $context = 'staff'): bool
    {
        return match ($context) {
            'customers' => $user->can(PermissionEnum::CUSTOMERS_CREATE->value),
            default => $user->can(PermissionEnum::STAFF_CREATE->value),
        };
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if ($model->hasRole(RoleEnum::CUSTOMER->value)) {
            return $user->can(PermissionEnum::CUSTOMERS_UPDATE->value);
        }

        if (!$user->can(PermissionEnum::STAFF_UPDATE->value)) {
            return false;
        }
        if ($model->hasRole(RoleEnum::SUPER_ADMIN->value)) {
            return $user->hasRole(RoleEnum::SUPER_ADMIN->value);
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * For a customer this backs the customers.destroy route, which is
     * gated on CUSTOMERS_BLACKLIST rather than a delete permission - see
     * routes/admin.php. Customer records are conceptually blacklisted,
     * not hard-deleted, even though the controller action is still named
     * destroy() today.
     */
    public function delete(User $user, User $model): bool
    {
        if ($model->hasRole(RoleEnum::CUSTOMER->value)) {
            return $user->can(PermissionEnum::CUSTOMERS_BLACKLIST->value);
        }

        if (!$user->can(PermissionEnum::STAFF_DEACTIVATE->value)) {
            return false;
        }

        if ($model->hasRole(RoleEnum::SUPER_ADMIN->value)) {
            return $user->hasRole(RoleEnum::SUPER_ADMIN->value);
        }

        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $this->update($user, $model);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $this->delete($user, $model);
    }
}
