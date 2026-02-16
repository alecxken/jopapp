<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CspNonceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share CSP nonce with all views
        View::composer('*', function ($view) {
            $nonce = request()->attributes->get('csp_nonce', '');
            $view->with('cspNonce', $nonce);
        });
    }
}
