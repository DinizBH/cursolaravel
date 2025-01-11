<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use WW\Faker\Provider\Picture;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FakerGenerator::class, function () {
            $faker = FakerFactory::create();
            $faker->addProvider(new Picture($faker)); // Adiciona o provedor personalizado
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu',$categoriasMenu);
    }
}
