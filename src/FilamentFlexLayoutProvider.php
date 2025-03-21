<?php

namespace Kingmaker\FilamentFlexLayout;

use Illuminate\Support\ServiceProvider;

class FilamentFlexLayoutProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-flex-layout');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/filament-flex-layout'),
        ], 'filament-flex-layout-views');
    }
}