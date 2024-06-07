<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider
 *
 * @package App\Providers
 */
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
        $this->defineGates();
    }

    /**
     *
     */
    private function defineGates()
    {
        Gate::define('admin.dashboard', 'App\Policies\Admin@view');

        Gate::define('admin.vlogger',        'App\Policies\Admin\VloggerPolicy@view');
        Gate::define('admin.vlogger.add',    'App\Policies\Admin\VloggerPolicy@add');
        Gate::define('admin.vlogger.edit',   'App\Policies\Admin\VloggerPolicy@edit');
        Gate::define('admin.vlogger.delete', 'App\Policies\Admin\VloggerPolicy@delete');
    }
}
