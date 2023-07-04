<?php

namespace BlackPanda\LaravelCryptoInvoice;

use Illuminate\Support\ServiceProvider;

class CryptoInvoiceServiceProvider extends ServiceProvider
{

    /*
     * Butting Package migrations and publishes
     */
    public function boot()
    {
        /*
         * publishes
         */
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'crypto-invoice-migrations');


        /**
         * load migrations
         */
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');

    }

}
