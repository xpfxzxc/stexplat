<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;
use App\Models\Student;
use App\Policies\StudentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('select-role', function ($user) {
            return ( ! $user->hasAnyRole(Role::all()));
        });

        Gate::define('college-store', function ($user) {
            return ( ! $user->hasAnyRole(Role::all()));
        });

        Gate::define('student-store', function ($user) {
            return ( ! $user->hasAnyRole(Role::all()));
        });

        Gate::define('update-course', function ($user, \App\Models\Course $course) {
            return $user->id === $course->college->user->id;
        });

        Gate::define('manage-course', function ($user) {
            return $user->hasRole('College');
        });

        Gate::define('register-course', function (\App\Models\User $user, $course_id) {
            if ( ! $user->hasRole('Student')) return false;
            $register = \App\Models\Register::where('student_id', $user->id)->where('course_id', $course_id)->count();
            return ( ! $register);
        });
    }
}
