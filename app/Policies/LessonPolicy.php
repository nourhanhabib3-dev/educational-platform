<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LessonPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny( $user): bool
    {
       return Auth::guard('manage')->check() || Auth::guard('tech')->check() ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lesson $lesson): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create( $user , Course $course ): bool
    {
       if(Auth::guard('tech')->check()){
           return Auth::guard('tech')->user()->id == $course->teacher_id;
        }else{
            return false ;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update( $user, Lesson $lesson): bool
    {

        if(Auth::guard('manage')->check()){
            return true ;
        }elseif(Auth::guard('tech')->check()){

            return Auth::guard('tech')->user()->id == $lesson->course->teacher_id;
        }else{
            return false ;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete( $user, Lesson $lesson): bool
    {
        return $this->update($user , $lesson);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lesson $lesson): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lesson $lesson): bool
    {
        return false;
    }
}
