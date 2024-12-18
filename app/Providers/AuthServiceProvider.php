<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('is-admin', function (User $user) {
            return $user->role()->exists() && $user->role->name === 'admin';
        });
        Gate::define('is-seller', function (User $user) {
            return $user->role->name === 'seller';
        });
        Gate::define('have-store', function (User $user) {
            return $user->store()->exists();
        });
        Gate::define('manage-store', function (User $user, Store $store) {
            return $user->store->id == $store->id;
        });
        Gate::define('manage-product', function ($user,$product) {
            return $user->store()->exists() && $user->store->products()->where('id', $product->id)->exists();
        });

    }
}
