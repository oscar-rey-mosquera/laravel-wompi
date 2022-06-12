<?php

namespace LaravelWompi;

use Bancolombia\Wompi;
use Illuminate\Support\ServiceProvider;

class LaravelWompiProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadConfig();
    }

    public function boot()
    {
        $this->publishConfig();
        $this->initializeWompi();
    }



    private function loadConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-wompi.php',
            'laravel-wompi'
        );
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-wompi.php' => config_path('laravel-wompi.php'),
        ], 'laravel-wompi');
    }

    private function initializeWompi()
    {

        Wompi::initialize([
            'public_key' => config('laravel-wompi.public_key'),
            'private_key' => config('laravel-wompi.private_key'),
            'private_event_key' => config('laravel-wompi.private_event_key')
        ]);
    }
}
