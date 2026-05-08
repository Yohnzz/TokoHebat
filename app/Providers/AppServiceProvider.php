<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\AuthRepository;
use App\Interface\AuthInterface;
use app\Interface\KategoriInterface;
use App\Interface\ProdukInterface;
use App\Repository\KategoriRepository;
use App\Repository\ProdukRepository;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public array $bindings = [
        AuthInterface::class => AuthRepository::class,
        ProdukInterface::class => ProdukRepository::class,
        KategoriInterface::class => KategoriRepository::class,
    ];
    public function register(): void
    {
        foreach ($this->bindings as $implement => $interface){
            App::bind($implement, $interface);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
