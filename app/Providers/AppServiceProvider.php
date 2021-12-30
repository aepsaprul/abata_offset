<?php

namespace App\Providers;

use App\Models\OffsetProduk;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $produk = OffsetProduk::get();

        view()->share('produks',$produk);
    }
}
