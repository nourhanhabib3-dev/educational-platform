<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        return Auth::guard('manage')->check() || Auth::guard('tech')->check();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, Course $course): bool
    {
        if (Auth::guard('manage')->check()) {
            return true;
        }

        if (Auth::guard('tech')->check()) {
            return Auth::guard('tech')->user()->id == $course->teacher_id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return Auth::guard('tech')->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update( $user, Course $course): bool
    {
        if ( Auth::guard('manage')->check()) {
            return true;
        } elseif (Auth::guard('tech')->check()) {
            return Auth::guard('tech')->user()->id == $course->teacher_id;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Course $course): bool
    {
        return $this->update($user , $course);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        return false;
    }
}
