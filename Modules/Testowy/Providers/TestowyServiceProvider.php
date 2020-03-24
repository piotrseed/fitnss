<?php

namespace Modules\Testowy\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Testowy\Events\Handlers\RegisterTestowySidebar;

class TestowyServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterTestowySidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('kategories', array_dot(trans('testowy::kategories')));
            $event->load('products', array_dot(trans('testowy::products')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('testowy', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Testowy\Repositories\KategoryRepository',
            function () {
                $repository = new \Modules\Testowy\Repositories\Eloquent\EloquentKategoryRepository(new \Modules\Testowy\Entities\Kategory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Testowy\Repositories\Cache\CacheKategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Testowy\Repositories\ProductsRepository',
            function () {
                $repository = new \Modules\Testowy\Repositories\Eloquent\EloquentProductsRepository(new \Modules\Testowy\Entities\Products());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Testowy\Repositories\Cache\CacheProductsDecorator($repository);
            }
        );
// add bindings


    }
}
