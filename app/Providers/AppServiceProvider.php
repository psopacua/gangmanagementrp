<?php
/**
 * Bekende Vloggende Nederlanders
 */

namespace App\Providers;

use App\Http\View\Composers\UserDataComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /** @var array $composers */
    private $composers = [
        'layouts.app' => [
            UserDataComposer::class
        ]
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewComposers();

        // @todo: Update MySQL
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

    /**
     * Load view composers.
     *
     * @return void
     */
    private function loadViewComposers()
    {
        foreach ($this->composers as $view => $classes) {
            foreach ($classes as $class) {
                View::composer($view, $class);
            }
        }
    }
}
