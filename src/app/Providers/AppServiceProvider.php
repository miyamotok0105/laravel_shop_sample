<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domain\Repositories\IShopRepository;
use App\Infrastructure\Repositories\ShopRepositoryRDB;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use App\Articles;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IShopRepository::class, ShopRepositoryRDB::class);
        
        // $this->app->bind(
        //     Articles\ArticlesRepository::class,
        //     Articles\EloquentRepository::class
        // );

        $this->app->bind(Articles\ArticlesRepository::class, function () {
            // This is useful in case we want to turn-off our
            // search cluster or when deploying the search
            // to a live, running application at first.
            if (! config('services.search.enabled')) {
                return new Articles\EloquentRepository();
            }

            return new Articles\ElasticsearchRepository(
                $this->app->make(Client::class)
            );
        });

        $this->bindSearchClient();

    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }
}
