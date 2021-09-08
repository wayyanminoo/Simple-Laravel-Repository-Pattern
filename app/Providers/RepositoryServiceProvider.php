<?php

namespace App\Providers;

use App\Repositories\BookRepoInterface;
use App\Repositories\BookRepository;
use App\Repositories\CustomerRepoInterface;
use App\Repositories\CustomerRepository;
use App\Repositories\ItemRepoInterface;
use App\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BookRepoInterface::class, BookRepository::class);
        $this->app->bind(CustomerRepoInterface::class, CustomerRepository::class);
        $this->app->bind(ItemRepoInterface::class, ItemRepository::class);
    }
}
