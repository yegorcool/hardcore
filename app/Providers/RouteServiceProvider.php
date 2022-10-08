<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/report';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
//            Route::middleware([
//                'web',
//                'verified',
//                'check_user_role:admin',
//            ])
//                ->as('admin.')
//                ->prefix('/admin')
//                ->group(base_path('routes/web_admin.php'));

            Route::middleware([
                'web',
                'verified',
                'check_user_role:producer',
            ])
                ->as('producer.')
                ->prefix('/producer')
                ->group(base_path('routes/web_producer.php'));

            Route::middleware([
                'web',
                'verified',
                'check_user_role:support',
            ])
                ->as('support.')
                ->prefix('/support')
                ->group(base_path('routes/web_support.php'));

            Route::middleware([
                'web',
                'verified',
                'check_user_role:fighter',
            ])
                ->as('fighter.')
                ->prefix('/fighter')
                ->group(base_path('routes/web_fighter.php'));

            Route::middleware([
                'web',
                'verified',
                'check_user_role:buyer',
            ])
                ->as('buyer.')
                ->prefix('/buyer')
                ->group(base_path('routes/web_buyer.php'));
//
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
