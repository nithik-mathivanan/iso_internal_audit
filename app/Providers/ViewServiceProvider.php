<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composer\MetaComposer;

class ViewServiceProvider extends ServiceProvider
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
      //Attach view composers
        View::composer([
            'superadmin.dashboard',
            'superadmin.nominee.create',
            'superadmin.user.*',
            'superadmin.company.*'
        ], MetaComposer::class);
    }
}
