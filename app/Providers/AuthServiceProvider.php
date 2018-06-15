<?php

namespace App\Providers;

use App\Entity\Post\Post;
use App\Entity\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('admin-panel', function(User $user) {
            return $user->isAdmin();
        });
        Gate::define('post-owner', function(User $user, Post $post) {
            return $user->isAdmin() || $post->owner_id === $user->id;
        });
    }
}
