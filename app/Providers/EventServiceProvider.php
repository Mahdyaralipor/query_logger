<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        QueryExecuted::class => [
            \App\Listeners\LogQueryListener::class,
        ],
    ];

    public function boot()
    {
        //
    }
}