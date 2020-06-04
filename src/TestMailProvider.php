<?php

namespace Horasachy\Mail;

use Illuminate\Support\ServiceProvider;


class TestMailProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/mail.php' => config_path('mail.php')
            ]
        );

        $this->loadViewsFrom(
            __DIR__ . '/../views', 'mail'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/mail.php', 'local'
        );


    }

}
