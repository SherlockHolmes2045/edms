<?php

namespace App\Providers;

use Google_Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Google_Client::class, function ($app) {
            $client = new Google_Client();
            Storage::disk('local')->put('client_secret.json', json_encode([
                'web' => config('services.google')
            ]));
            $client->setAuthConfig(Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix('public/client_secret.json'));
            return $client;
        });
    }
}
