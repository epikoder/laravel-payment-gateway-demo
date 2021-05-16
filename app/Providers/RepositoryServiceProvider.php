<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        BaseRepositoryInterface::class => BaseRepository::class,
    ];
}
